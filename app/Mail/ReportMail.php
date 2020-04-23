<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $file_url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file_url)
    {
        $this->file_url = $file_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file_url =$this->file_url;
        return $this->markdown('emails.report', compact('file_url'));
    }
}
