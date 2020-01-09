<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
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
     * @param UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {

        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
        Mail::send('mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Welcome email');
            $message->from('kadzokanene@gmail.com','kisila');
        });

    }
}
