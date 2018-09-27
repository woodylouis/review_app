@extends('layouts.master')

@section('tagTitle')
    All Users
@endsection

@section('content')

  <h1>All Users</h1>
  <ul class="users list-unstyled">
    @foreach ($users as $user)
      <li>
        <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="user-image" alt="profile-img" width="38" height="38">
        <a href="{{ route('user.show', $user->id) }}" class="username">{{ $user->name }}</a>
      </li>
    @endforeach
  </ul>
  {!! $users->render() !!}

@stop