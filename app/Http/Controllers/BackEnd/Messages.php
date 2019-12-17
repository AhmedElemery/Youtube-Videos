<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\messages\store;
use App\Mail\ReplayMessage;
use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Messages extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function messageReplay($id , store $request)
    {
        $contactMessage = $this->model->findOrFail($id);
        Mail::send(new ReplayMessage($contactMessage , $request->message));

        return redirect()->route('messages.edit' , ['id'=> $contactMessage->id]);
    }
}
