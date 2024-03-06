<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailContatti extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $name, public $email, public $messageBody)
    {
        
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hai un nuovo messaggio da' . config('app.name'),
        );
    }

       public function content(): Content
    {
        return new Content(
            view: 'mail.mail-contacts',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
