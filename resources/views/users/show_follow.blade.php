@extends('layouts.master')
@section('tagTitletitle', $title)

@section('content')

  <h1>{{ $title }}</h1>
  <ul class="users">
    @foreach ($users as $user)
      <li>
        <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="user-image" alt="profile-img" width="38" height="38">
        <a href="{{ route('user.show', $user->id )}}" class="username">{{ $user->name }}</a>
      </li>
    @endforeach
  </ul>

  {!! $users->render() !!}

@stop