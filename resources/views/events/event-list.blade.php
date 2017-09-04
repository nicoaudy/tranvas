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
                    {{ $upcoming->description }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
