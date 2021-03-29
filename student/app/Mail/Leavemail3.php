<?php

namespace App\Mail;

use App\Models\student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Leavemail3 extends Mailable
{
    use Queueable, SerializesModels;
    public $student;
    public $url;
    public $url_decline;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(student $student , $url, $url_decline)
    {
       $this->student = $student;
       $this->url = $url;
       $this->url_decline = $url_decline;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.leave3');
    }
}
