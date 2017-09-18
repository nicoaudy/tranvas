<?php

namespace App\Modules\Event\Listeners;

use App\Modules\Event\Events\EventRegistered;
use App\Modules\Event\Jobs\RegistrationConfirmationEmail;

class EventEventsListener
{
    public function subscribe($events)
    {
        $class = "App\Modules\Event\Listeners\EventEventsListener";
        $events->listen(EventRegistered::class, "{$class}@handleEventRegistered");
    }

    public function handleEventRegistered(EventRegistered $eventRegistered)
    {
        dispatch(new RegistrationConfirmationEmail($eventRegistered->event, $eventRegistered->user));
    }
}
