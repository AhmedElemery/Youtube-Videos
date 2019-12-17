<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\pages\store;
use App\Model\Page;
use Illuminate\Http\Request;

class Pages extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }


    public function store(store $request)
    {
        $this->model->create($request->all());
        return redirect()->route('pages.index');

    }



    public function update($id , store $request)
    {
        $row= $this->model->findOrFail($id);
        $row->update($request->all());
        return redirect()->route('pages.index');
    }
}
