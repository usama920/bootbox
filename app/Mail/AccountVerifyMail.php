<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountVerifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $verification;
    /**
     * Create a new message instance.
     */
    public function __construct($verification)
    {
        $this->verification = $verification;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Account Verification Mail')
            ->from( env('MAIL_FROM_ADDRESS'))
            ->view('mail.verification');
    }
}
