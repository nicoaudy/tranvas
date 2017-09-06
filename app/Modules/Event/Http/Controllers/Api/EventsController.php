<?php

namespace App\Modules\Event\Http\Controllers\Api;

use Illuminate\Http\Request;
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
        $user   = $request->user();
        $event  = $this->event->getById($request->input('eventId'));
        return $event;
    }
}
