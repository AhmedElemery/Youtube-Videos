<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class Users extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'group' => 'required',
        ];
        $this->validate($request , $rules);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);
        return redirect()->route('users.index');

    }



    public function update($id , Request $request)
    {
        $row= User::findOrFail($id);
        $rules = [
            'name' => 'string|max:40',
            'email' => 'required', 'string', 'email', 'max:191', 'unique:users,email,'.$row,
            'group' => 'required',
        ];
        $this->validate($request , $rules);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'group' => $request->group,
        ];

        if(request()->has('password') && $request->get('password') != '')
        {
            $data['password'] = bcrypt($request->password);
        }
        else{
            unset($data['passwword']);
        }

        $row->update($data);
        return redirect()->route('users.index');
    }



}
