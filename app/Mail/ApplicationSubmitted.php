<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\Attributes\Queue;
use Illuminate\Queue\SerializesModels;

#[Queue('mails')]
class ApplicationSubmitted extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Application $application)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Prihláška do Coda Academy dorazila',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.application.submitted',
        );
    }
}
