<?php

namespace elbauldelcodigo\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use elbauldelcodigo\Contacto;

class SendMailContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contacto $contacto)
    {
        $this->contact = $contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('buzon@elbauldelcodigo.com')
                    ->subject(trans('message.subjectMailContact'))
                    ->view('emails.contacts');
    }
}
