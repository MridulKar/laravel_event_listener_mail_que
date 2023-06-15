<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\SendMail;
use App\Events\EmailSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyByEmail
{

    public function __construct()
    {

    }


    public function handle(EmailSent $event): void
    {
        $users = User::get();
        foreach($users as $user){
          Mail::to($user->email)->send(new SendMail($event->email_data));
        }
    }
}
