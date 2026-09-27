<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioDocumentosMail extends Mailable
{
    use Queueable, SerializesModels;
    public $envio;
    public $linkPublico;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($envio, $linkPublico)
    {
        $this->envio = $envio;
        $this->linkPublico = $linkPublico;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' Resultados de Seleção')
                    ->view('emails.envio_documentos');
    }
}
