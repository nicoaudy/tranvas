@extends('layouts')

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-push-2">
        <h1>
            Upcoming Events
            <div class="pull-right">
                <a href="{{ route('event.add') }}" class="btn btn-success">Add event</a>
            </div>
        </h1>

        @foreach($upcomingEvents as $upcoming)
            {{ dump($upcoming->toArray()) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">
                        <a href="{{ route('event.view', $upcoming->slug) }}">
                            #{{ $upcoming->id }} - {{ $upcoming->title }}
                        </a>
                    </h3>
                    <small class="padding-left-20">{{ $upcoming->address }}</small>
                </div>
                <div class="panel-body">
                    <div class="meta-data margin-bottom-20">
                        <strong>Start Date:</strong> {{ $upcoming->start_date }}
                        <br>
                        <strong>End Date:</strong> {{ $upcoming->end_date }}
                        <br>
                        <strong>Created By:</strong> {{ $upcoming->creator->name }}
                    </div>
                    <div class="description">
                        <p>{!! limit_words($upcoming->description, 50) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-sm-push-2">
        <h1>Past Events</h1>

        @forelse($pastEvents as $past)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">
                        <a href="{{ route('event.view', $past->slug) }}">{{ $past->title }}</a>
                    </h3>
                    <small class="padding-left-20">{{ $past->address }}</small>
                </div>
                <div class="panel-body">
                    <div class="meta-data margin-bottom-20">
                        <strong>Start Date:</strong> {{ $past->start_date }}
                        <br>
                        <strong>End Date:</strong> {{ $past->end_date }}
                        <br>
                        <strong>Created By:</strong> {{ $past->creator->name }}
                    </div>
                    <div class="description">
                        <p>{!! limit_words($past->description, 50) !!}</p>
                    </div>
                </div>
            </div>
        @empty
            <h3>No past events.</h3>
        @endforelse
    </div>
</div>
@endsection
