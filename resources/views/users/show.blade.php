@extends('layouts.master')
@section('tagTitle', $user->name)

@section('content')
  @if (Auth::check())
    <div class="row text-left">
      <div class="col-md-offset-2 col-md-8 ">
        <div class="col-md-12">
          
            <section class="user_info text-center">
              @include('shared._user_info', ['user' => $user])
            </section>
            <section class="stats">
              @include('shared._stats', ['user' => $user])
            </section>
    
        </div>
        <div class="col-md-12 ">
          @if (Auth::check())
            @include('users._follow_form')
          @endif
          <h3>Reviews</h3>
          @include('shared._feed')
        </div>
      </div>
    </div>
  @else
    <div class="jumbotron">
      <h1>Product Review</h1>
      <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Sign up now</a>
      </p>
    </div>    
  @endif
@stop