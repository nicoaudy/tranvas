<?php

namespace App\Modules\Event\Jobs;

use App\User;
use App\Modules\Event\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use App\Modules\Event\Mail\RegistrationConfirm;

class RegistrationConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $event;
    private $user;

    public function __construct(Event $event, User $user)
    {
        $this->event    = $event;
        $this->user     = $user;
    }

    public function handle()
    {
        Mail::to($this->user)->send(new RegistrationConfirm($this->user, $this->event));
    }
}
