<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class enviar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $enviar;

    public function __construct(Request $request)
    {
       $enviar = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('hello@app.com', 'Your Application')
       ->subject('Your Reminder!');
       //->view('usuario.mail');
    }
}
