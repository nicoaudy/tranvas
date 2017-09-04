@extends('layouts')

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-push-2">
        <h1>Upcoming Events</h1>

        @foreach($upcomingEvents as $upcoming)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{ $upcoming->title }}</h3>
                    <small>{{ $upcoming->address }}</small>
                </div>
                <div class="panel-body">
                    <div class="meta-data">
                        <strong>Start Date:</strong> {{ $upcoming->start_date }}
                        <br>
                        <strong>End Date:</strong> {{ $upcoming->end_date }}
                        <br>
                        <strong>Created By:</strong> {{ $upcoming->creator->name }}
                    </div>
                    <div class="description">
                        <p>{{ $upcoming->description }}</p>
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
                    <h3 class="panel-heading">{{ $past->title }}</h3>
                    <small>{{ $past->address }}</small>
                </div>
                <div class="panel-body">
                    <div class="meta-data">
                        <strong>Start Date:</strong> {{ $past->start_date }}
                        <br>
                        <strong>End Date:</strong> {{ $past->end_date }}
                        <br>
                        <strong>Created By:</strong> {{ $past->creator->name }}
                    </div>
                    <div class="description">
                        <p>{{ $past->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <h3>No past events.</h3>
        @endforelse
    </div>
</div>
@endsection
