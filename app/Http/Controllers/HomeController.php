<?php

namespace App\Http\Controllers;

use App\Http\Requests\frontend\comments\store;
use App\Http\Requests\frontend\messages\store as MessagesStore;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Message;
use App\Model\Page;
use App\Model\Skill;
use App\Model\Tag;
use App\Model\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate' , 'commentStore'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::published()->orderBy('id' , 'desc');

        if(request()->has('search') && request()->get('search') != '')
        {
            $videos = $videos->where('name' , 'like' , '%'.request()->get('search').'%');
        }

        $videos = $videos->paginate(9);
        return view('home' , compact('videos'));
    }
    public function Category($id)
    {
        $cat = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(9);
        return view('front-end.category.index' , compact('videos' , 'cat'));
    }
    public function Skill($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::published()->whereHas('skills' , function($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate(9);
        return view('front-end.skill.index' , compact('videos' , 'skill'));
    }
    public function Tag($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags' , function($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id' , 'desc')->paginate(9);
        return view('front-end.tag.index' , compact('videos' , 'tag'));
    }
    public function Video($id)
    {
        $video = Video::published()->with('skills' , 'tags' , 'cat' , 'user' , 'comments.user')->findOrFail($id);
        return view('front-end.video.index' , compact('video'));
    }

    public function commentUpdate($id , store $request)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id == auth()->user()->id || auth()->user()->group == 'admin')
        {
            $comment->update(['comment' =>$request->comment]);
            alert()->success('your Comment has been Updated Successfully', ' Done');
        }
        alert()->error('we did not find this comment', ' Done');

        return redirect()->route('frontend.video' , ['id' => $comment->video_id , '#comments']);

    }
    public function commentStore($id , store $request)
    {
        $video = Video::published()->findOrFail($id);
        Comment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);

        return redirect()->route('frontend.video' , ['id' => $video->id , '#comments']);

    }

    public function messageStore(MessagesStore $request)
    {
        Message::create($request->all());
        alert()->success('your message has been Sent Successfully', ' Done');
        return redirect()->route('frontend.landing');
    }

    public function welcome () {
        $videos = Video::published()->orderBy('id' , 'desc')->paginate(9);
        $comments_count = Comment::count();
        $skills_count = Skill::count();
        $tags_count = Tag::count();
        return view('welcome' , compact('videos' ,'comments_count' ,'skills_count','tags_count' ));
    }

    public function Page($id , $slug=null)
    {
        $page = Page::findOrFail($id);
        return view('front-end.page.index' , compact('page'));
    }
}
