<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\categories\store;
use App\Model\Category;
use Illuminate\Http\Request;

class Categories extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
   

    public function store(store $request) 
    {
        $this->model->create($request->all());
        return redirect()->route('categories.index');
        
    }

    

    public function update($id , store $request) 
    {
        $row= $this->model->findOrFail($id);
        $row->update($request->all());
        return redirect()->route('categories.index');
    }
}
