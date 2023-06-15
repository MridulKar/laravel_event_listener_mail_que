<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email_data;
    public function __construct($email_data)
    {
        $this->email_data = $email_data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laravel Event Listener Mail Que',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email_body',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
