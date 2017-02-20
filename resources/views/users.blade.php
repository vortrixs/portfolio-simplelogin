@extends('templates.app')
@section('assets')
<title>All Users</title>
<style>
td {
    padding: 0 20px !important;
}
</style>
@endsection
@section('content')
    <table>
        <thead>
            <td>Username</td>
            <td>Name</td>
            <td>Email</td>
            <td>Birthday</td>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ route('user.profile', $user->id) }}" > {{ $user->username }}</a></td>
                    <td>{{ $user->user_info->name }}</td>
                    <td>{{ $user->user_info->email }}</td>
                        <td>@if(null !== $user->user_info->birthday) {{ date('d-m-Y',strtotime($user->user_info->birthday)) }} @endif</td>
                </tr>
            @endforeach
        </tbody>
@endsection
