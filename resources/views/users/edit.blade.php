@extends('layouts.master')

@section('tagTitle')
    Edit User
@endsection


@section('content')
    
        <h2>Update</h2>
        
            
        <form method="POST" action="{{ route('user.update', $user->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            
            
            <div class="form-group">
              <label for="name">User Name：</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email">Email：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
              <label for="password">Password：</label>
              <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirmation：</label>
              <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div>

            <button type="submit" class="btn bg text-light">Update</button>
        </form>
       
@endsection


