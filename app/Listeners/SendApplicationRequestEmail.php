<?php

namespace App\Listeners;

use App\Events\ApplicationRequestEvent;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApplicationRequestEmail
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
     * @param  ApplicationRequestEvent  $event
     * @return void
     */
    public function handle(ApplicationRequestEvent $event)
    {
//        $admin = User::where('role_id', 1)->first();
////        $mail_data = array('data' => $data);
//        Mail::send('mails.new_application', $mail_data, function($message) use ($admin) {
//            $message->to($admin->email)->subject('Vacation Request');
//            $message->from(auth()->user()->email);
//        });
    }
}
