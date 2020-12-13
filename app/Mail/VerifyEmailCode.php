<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmailCode extends Mailable
{
    use Queueable, SerializesModels;

    protected $email,$name,$id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$id)
    {
        $this->email = $email;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->email;
        $name = $this->name;
        $id = $this->id;
        $url = config('app.url');
        return $this->subject("Verify Account")->view('auth.verifyview',compact("email",'name','id','url'));
    }
}
