<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    public $confirmed;
    /**
     * Create a new message instance.
     */
    public function __construct($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Verification Confirmed')
            ->from( env('MAIL_FROM_ADDRESS'))
            ->view('mail.confirm');
    }
}
