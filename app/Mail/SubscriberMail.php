<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($user)
    {
        $this->user=$user;
        $this->subject('Admin Reset Password');
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        die();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.subscriber')->with([
            'user'=>$this->user,
        ]);;
    }
}
