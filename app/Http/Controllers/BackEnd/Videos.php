<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\videos\store;
use App\Model\Category;
use App\Model\Skill;
use App\Model\Tag;
use App\Model\Video;

class Videos extends BackEndController
{
    use CommentTrait;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $rows = $this->model->with('cat' , 'user');
        $rows = $this->filter($rows);
        $rows = $rows->paginate(4);

        $module = $this->pluralModelName();
        $pageTitle = 'Control ' . $module;
        $pageDesc = 'Here You Can Edit , Delete ' . $module;
        $routeName = $this->getClassNameFromModel();


        return view('back-end.'.$this->getClassNameFromModel().'.index', compact(
            'rows',
            'module',
            'pageTitle',
            'pageDesc',
            'routeName',
        ));
    }

    public function create()
    {
        $module = $this->pluralModelName();
        $pageTitle = 'Create ' . $module;
        $pageDesc = 'Here You Can Create ' . $module;
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $categories = Category::get();
        $skills = Skill::get();
        $tags = Tag::get();

        $selectedSkills = [];
        $selectedTags = [];

        if(request()->route()->parameter('video'))
        {
            $selectedSkills = $this->model->find(request()->route()->parameter('videos'))->skills()->get()->pluck('id')->toArray();
            $selectedTags = $this->model->find(request()->route()->parameter('videos'))->tags()->get()->pluck('id')->toArray();
        }


        return view('back-end.'.$folderName.'.create' , compact(
            'module',
            'pageTitle',
            'pageDesc',
            'routeName',
            'folderName',
            'categories',
            'skills',
            'tags',
            'selectedSkills',
            'selectedTags'
        ));
    }

    public function edit($id)
    {
        $module = $this->pluralModelName();
        $pageTitle = 'Edit ' . $module;
        $pageDesc = 'Here You Can Edit ' . $module;
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $categories = Category::get();
        $skills = Skill::get();
        $tags = Tag::get();
        $selectedSkills = $this->model->find($id)->skills()->get()->pluck('id')->toArray();
        $selectedTags = $this->model->find($id)->tags()->get()->pluck('id')->toArray();

        $comments = $this->model->find($id)->comments()->orderBy('id' , 'desc')->with('user')->get();


        $row = $this->model->findOrFail($id);
        return view('back-end.'. $folderName.'.edit' , compact(
            'row',
            'module',
            'pageTitle',
            'pageDesc',
            'routeName',
            'folderName',
            'categories',
            'skills',
            'tags',
            'selectedSkills',
            'selectedTags',
            'comments'

        ));
    }

    public function store(store $request)
    {
        $file = $request->file('image');
        $fileName = time().str_random('10').'.'. $file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        $requestArray = ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->all();

        $row = $this->model->create( $requestArray);

        if(isset($requestArray['skills']) && !empty($requestArray['skills']))
        {
            $row->skills()->sync($requestArray['skills']);
        }
        if(isset($requestArray['tags']) && !empty($requestArray['tags']))
        {
            $row->tags()->sync($requestArray['tags']);
        }
        return redirect()->route('videos.index');

    }



    public function update($id , store $request)
    {
        $requestArray = $request->all();
        dd($requestArray);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().str_random('10').'.'. $file->getClientOriginalExtension();
            $file->move(public_path('uploads') , $fileName);

            $requestArray = ['image' => $file] +   $requestArray;
        }

        $row= $this->model->findOrFail($id);
        $row->update($requestArray);

        if(isset($requestArray['skills']) && !empty($requestArray['skills']))
        {
            $row->skills()->sync($requestArray['skills']);
        }

        if(isset($requestArray['tags']) && !empty($requestArray['tags']))
        {
            $row->tags()->sync($requestArray['tags']);
        }


        return redirect()->route('videos.edit' , ['id'=> $row->id]);
    }
}
