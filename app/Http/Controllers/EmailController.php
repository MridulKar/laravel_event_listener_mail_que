<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Events\EmailSent;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request){

        $email_data = [
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
        ];

        Email::create($email_data);


        event(new EmailSent($email_data));

        return redirect()->back();

    }
}
