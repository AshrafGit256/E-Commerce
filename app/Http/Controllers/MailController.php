<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $details = [
            'title' => 'Mail from Mailtrap',
            'body' => 'This is a test email sent using Mailtrap.'
        ];

        Mail::to('ashrafwalusimbi364@gmail.com')->send(new TestMail($details));

        return 'Email sent successfully!';
    }
}
