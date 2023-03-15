<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    public $newsletterMail;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($newsletter)
    {
        $this->newsletterMail = $newsletter;
    }
    /**
     * Get the message envelope.
     */
    public function build(){
        return $this->subject('Mail to Newsletter Subscriber')
            ->from('bootbox@newsletter.com')
            ->view('mail.newsletter');
    }
}
