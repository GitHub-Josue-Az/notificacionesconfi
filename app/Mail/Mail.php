<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;


class Mail extends Mailable
{
    use Queueable, SerializesModels;

     public $usuario;

    public function __construct(User $usuario)
    {
         $this->usuario= $usuario;
    }

    public function build()
    {
        return $this->view('emails.tarjetamail');
        
    }
}
