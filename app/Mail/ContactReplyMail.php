<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    public $contactReplyMail;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($contactReply)
    {
        $this->contactReplyMail = $contactReply;
    }

    /**
     * Get the message envelope.
     */
    public function build(){
        return $this->subject('Question Reply by BootBox')
            ->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.contact_reply');
    }
}
