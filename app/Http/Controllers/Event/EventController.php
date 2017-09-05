<?php

namespace App\Http\Controllers\Event;

use Carbon\Carbon;
use App\Modules\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');

        $upcomingEvents = Event::where('end_date', '>', $today)->orderBy('start_date', 'desc')->get();
        $pastEvents     = Event::where('end_date', '<', $today)->orderBy('start_date', 'desc')->limit(3)->get();
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
