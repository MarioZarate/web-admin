<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Contacto;

class FormContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $contacto;

    public function __construct(Contacto $contacto)
    {
        $this->contacto = $contacto;
    }

    public function build()
    {
        return $this->from('noreply-correo@screativa.com')
            ->subject('Contacto')
            ->view('emails.formContacto');
    }
}