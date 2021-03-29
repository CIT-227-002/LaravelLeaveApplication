<?php

namespace App\Mail;

use App\Models\student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Employee extends Mailable
{
    use Queueable, SerializesModels;
    public $student, $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(student $student, $status)
    {
       $this->student = $student;
       $this->status = $status;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.employee');
    }
}
