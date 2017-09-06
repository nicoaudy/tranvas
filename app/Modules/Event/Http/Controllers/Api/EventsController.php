<?php

namespace App\Modules\Event\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Modules\Event\Participant;
use App\Http\Controllers\Controller;
use App\Modules\Event\Repositories\EventsRepository;

class EventsController extends Controller
{
    protected $event;

    public function __construct(EventsRepository $repository)
    {
        $this->event = $repository;
    }

    public function handleRegistration(Request $request)
    {
        $user        = $request->user();
        $event       = $this->event->getById($request->input('eventId'));
        $participant = Participant::where('user_id', $user->id)->where('event_id', $event->id)->first();

        if (!$participant) {
            $this->event->registerForEvent($event);
            return response(['message' => 'Registered.'], 201);
        }

        $this->event->unRegisterFromEvent($event);
        return response(['message' => 'Unregister'], 200);
    }
}
