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
        @can('destroy', $user)
          <form action="{{ route('user.destroy', $user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
          </form>
        @endcan
      </li>
    @endforeach
  </ul>
  {!! $users->render() !!}

@stop