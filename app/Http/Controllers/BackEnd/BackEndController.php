<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
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

        return view('back-end.'.$folderName.'.create' , compact(
            'module',
            'pageTitle',
            'pageDesc',
            'routeName', 
            'folderName'
        ));
    }

    public function edit($id)
    {
        $module = $this->pluralModelName();
        $pageTitle = 'Edit ' . $module;
        $pageDesc = 'Here You Can Edit ' . $module;
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();

        $row = $this->model->findOrFail($id);
        return view('back-end.'. $folderName.'.edit' , compact(
            'row',
            'module',
            'pageTitle',
            'pageDesc',
            'routeName',
            'folderName'

        ));
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');

    }

    public function getClassNameFromModel()
    {
        return str_plural($this->pluralModelName());
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function pluralModelName()
    {
        return strtolower(class_basename($this->model));
    }
}
