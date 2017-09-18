<?php

namespace App\Modules\Event\Listeners;

use App\Modules\Event\Events\EventRegistered;

class EventEventsListener
{
    public function subscribe($events)
    {
        $class = "App\Modules\Event\Listeners\EventEventsListener";
        $events->listen(EventRegistered::class, "{$class}@handleEventRegistered");
    }

    public function handleEventRegistered(EventRegistered $eventRegistered)
    {
        $username   = $eventRegistered->user->name;
        $eventId    = $eventRegistered->event->id;
        \Log::info("{$username} has registered for event {$eventId}");
    }
}
