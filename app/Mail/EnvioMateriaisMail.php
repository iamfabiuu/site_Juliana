<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMateriaisMail extends Mailable
{
    use Queueable, SerializesModels;
    public $envio;
    public $linkPublico;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($envio, $linkPublico, $assuntoEmail)
    {
        $this->envio = $envio;
        $this->linkPublico = $linkPublico;
        $this->subject = $assuntoEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.envio_materiais');
    }
}
