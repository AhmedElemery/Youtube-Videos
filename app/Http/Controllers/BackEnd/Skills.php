<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\skills\store;
use App\Model\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }
   

    public function store(store $request) 
    {
        $this->model->create($request->all());
        return redirect()->route('skills.index');
        
    }

    

    public function update($id , store $request) 
    {
        $row= $this->model->findOrFail($id);
        $row->update($request->all());
        return redirect()->route('skills.index');
    }
}
