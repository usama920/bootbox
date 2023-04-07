<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TwoStepVerifyMail extends Mailable
{
    public $twoStepVerifyEmail;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($twoStepVerifyEmail)
    {
        $this->twoStepVerifyEmail = $twoStepVerifyEmail;

    }

    /**
     * Get the message envelope.
     */
    public function build(){
        return $this->subject('User Verification Email')
            ->from(env('MAIL_FROM_ADDRESS'), 'Bootbox')
            ->view('mail.verification');
    }
}
