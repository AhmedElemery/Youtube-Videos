<?php

namespace App\Http\Controllers\BackEnd;

use App\Model\Comment;
use App\Model\User;

class Home extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        $comments = Comment::with('user' , 'video')->orderBy('id' , 'desc')->paginate(9);
        return view('back-end.home' , compact('comments'));
    }
}
