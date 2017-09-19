@extends('layouts')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>
                My Profile
                <span class="pull-right"><a href="#" class="btn btn-success">Add Event</a></span>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit My Profile</div>
                <div class="panel-body">
                    <form action="{{ route('profile-save') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" disabled>
                        </div>
                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary">
                                Save <i class="fa fa-upload"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
