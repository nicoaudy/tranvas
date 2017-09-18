<?php

namespace App\Modules\Event\Repositories;

use Carbon\Carbon;
use App\Modules\Event\Event;
use App\Modules\Event\Participant;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AbstractRepository;
use App\Modules\Event\Events\EventRegistered;
use App\Modules\Event\Repositories\EventsRepository;

class EloquentEvents extends AbstractRepository implements EventsRepository
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function getUpcomingEvents()
    {
        $select = [
            'e.id', 'e.title', 'e.description', 'e.address', 'e.start_date', 'e.end_date', 'e.slug', 'e.user_id',
            'p.user_id as user',
        ];

        return $this->model->select($select)
        ->from('events as e')
        ->leftJoin('participants as p', function ($query) {
            $query->on('p.event_id', '=', 'e.id');
            $query->where('p.user_id', Auth::user()->id);
        })
        ->where('end_date', '>', Carbon::today()->format('Y-m-d'))
        ->orderBy('start_date', 'desc')
        ->get();
    }
    public function getPastEvents()
    {
        return $this->model->where('end_date', '<', Carbon::today()->format('Y-m-d'))
        ->orderBy('start_date', 'desc')
        ->limit(3)
        ->get();
    }

    public function registerForEvent($event)
    {
        $participant = Participant::create([
            'event_id'   => $event->id,
            'user_id'    => Auth::user()->id,
        ]);

        event(new EventRegistered($event, Auth::user()));

        return true;
    }

    public function unRegisterFromEvent($event)
    {
        Participant::where('event_id', $event->id)
        ->where('user_id', Auth::user()->id)
        ->delete();

        return true;
    }
}
