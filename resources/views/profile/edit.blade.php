@extends('templates.app')
@section('assets')
    <title>Edit Your Profile</title>
@endsection
@section('content')
<span class="help-block">
    <strong>{{ session('error') }}</strong>
    <strong>{{ session('success') }}</strong>
</span>
<form method="post" action="{{ route('user.update.request', $user->user_id) }}">
    {!! csrf_field() !!}
    {!! method_field('patch') !!}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>
    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}">
            @if ($errors->has('birthday'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>
    <input type="submit">
</form>
@endsection
