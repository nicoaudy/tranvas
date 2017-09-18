<?php

namespace App\Modules\Event\Mail;

use App\User;
use App\Modules\Event\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirm extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $event;

    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    public function build()
    {
        return $this->view('emails.reg-confirm')
        ->with('user', $this->user)
        ->with('event', $this->event);
    }
}
