@extends('layouts')

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-push-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-heading">{{ $event->title }}</h3>
            </div>
            <div class="panel-body">
                <p><strong>Description:</strong></p>
                {{ $event->description }}
            </div>

            <div id="map"></div>

            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr>
                        <td><strong>Start Date:</strong></td>
                        <td>{{ $event->start_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date:</strong></td>
                        <td>{{ $event->end_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td>{{ $event->address }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created By:</strong></td>
                        <td><a href="#">{{ $event->creator->name }}</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
