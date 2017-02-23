<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;
use App\Notifications\MessageRecieved;

class MessageSentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $message = $event->message;

        $users = $event->message->thread->users;
    /*$data = array(
            'body'=>$message->body,
            );*/
        foreach($users as $user) {
            if($user->id != $message->sender->id) {
                /*Mail::send('emails.message', $data, function ($m) use ($user, $message) {
                    $m->from('system@nextdegree.co.uk', 'Next Degree');
                    $m->to($user->email, $user->email)->subject('New message from '.$message->sender->name);
                });*/
                $user->notify(new MessageRecieved($message));
            }
        }
    }
}
