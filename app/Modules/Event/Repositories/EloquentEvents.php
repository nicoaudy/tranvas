<?php

namespace App\Modules\Event\Repositories;

use Carbon\Carbon;
use App\Modules\Event\Event;
use App\Repositories\AbstractRepository;
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
        return $this->model->where('end_date', '>', Carbon::today()->format('Y-m-d'))
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
}
