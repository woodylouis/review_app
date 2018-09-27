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
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">User Name：</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
              </div>
            

              <label for="email">Email：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password：</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              
              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password_confirmation">Confirmation：</label>
              <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
              @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <button type="submit" class="btn bg text-light">Update</button>
        </form>
       
@endsection


