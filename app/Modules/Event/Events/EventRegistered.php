<?php

namespace App\Modules\Event\Events;

use App\User;
use App\Modules\Event\Event;

class EventRegistered
{
    public $event;
    public $user;

    public function __construct(Event $event, User $user)
    {
        $this->event    = $event;
        $this->user     = $user;
    }
}
