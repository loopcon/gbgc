<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommonMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($html, $subject)
    {
        $this->html = $html;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
     public function build()
    {
        $mail = $this->html($this->html)->subject($this->subject);
        return $mail;
    }
}
