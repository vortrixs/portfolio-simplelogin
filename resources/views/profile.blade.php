@extends('templates.app')
@section('assets')
    <title>{{ $user->username }}'s profile</title>
@endsection
@section('content')
<div>
    <p>Username: {{ $user->username }}</p>
    <p>Name: {{ $user->user_info->name }}</p>
    <p>Email: {{ $user->user_info->email }}</p>
    <p>Birthday: @if(null !== $user->user_info->birthday) {{ date('d-m-Y',strtotime($user->user_info->birthday)) }} @endif</p>
    @if(Auth::user()->id === $user->id)
        <p><a href="{{ route('user.update.form', $user->id) }}">Update your profile</a></p>
        <p><a href="{{ route('user.change_password.form', $user->id) }}">Change your password</a></p>
    @endif
</div>
@endsection
