<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplayMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $message, $replay;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message , $replay)
    {
        $this->message = $message;
        $this->replay = $replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $replayMessage = $this->message;
        $replay = $this->replay;
        return $this->to($replayMessage->email)->
        view('back-end.mails.replay_message', compact('replayMessage' , 'replay'));
    }
}
