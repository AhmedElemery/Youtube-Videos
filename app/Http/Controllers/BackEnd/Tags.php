<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\tags\store;
use App\Model\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
   

    public function store(store $request) 
    {
        $this->model->create($request->all());
        return redirect()->route('tags.index');
        
    }

    public function update($id , store $request) 
    {
        $row= $this->model->findOrFail($id);
        $row->update($request->all());
        return redirect()->route('tags.index');
    }
}
