<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\SystemSettingModel;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $setting;

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user; 
        $this->setting = SystemSettingModel::getSingle(); 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->setting->website_name.'Forgot Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
           markdown: 'emails.forgot_password',
           with: [
                'user' => $this->user,
           ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
