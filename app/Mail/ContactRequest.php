<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $time = "";
    /**
     * Create a new message instance.
     * @param array $data
     * @param string $time
     * @return void
     */
    public function __construct($data, $time)
    {
        $this->data = $data;
        $this->time = $time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contact Request')
            ->view('mails.ContactRequest');
    }
}
