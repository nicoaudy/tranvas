<?php

namespace App\Modules\Event\Http\Controllers;

use Carbon\Carbon;
use App\Modules\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Event\Repositories\EventsRepository;

class EventsController extends Controller
{
    protected $events;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->events = $eventsRepository;
    }


    public function index()
    {
        $upcomingEvents = $this->events->getUpcomingEvents();
        $pastEvents     = $this->events->getPastEvents();
        return view('events.event-list', compact('upcomingEvents', 'pastEvents'));
    }

    public function view(Event $event)
    {
        return view('events.event-view')->withEvent($event);
    }

    public function add()
    {
        return view('events.event-add');
    }

    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'title'         => 'required',
            'address'       => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'description'   => 'required',
            'lat'           => 'required',
            'lng'          => 'required',
        ]);
        $valid['slug']  = str_slug($valid['title']);

        Auth::user()->events()->create($valid);
        return redirect()->route('events');
    }
}
