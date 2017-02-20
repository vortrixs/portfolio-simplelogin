@extends('templates.app')
@section('assets')
    <title>Change Your Password</title>
@endsection
@section('content')
<span class="help-block">
    <strong>{{ session('error') }}</strong>
    <strong>{{ session('success') }}</strong>
</span>
<form method="post" action="{{ route('user.change_password.request', $user->id) }}">
    {!! csrf_field() !!}
    {!! method_field('patch') !!}
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>
    <input type="submit">
</form>
@endsection
