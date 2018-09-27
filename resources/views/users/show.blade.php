@extends('layouts.master')
@section('tagTitle', $user->name)

@section('content')
<div class="row text-left">
  <div class="col-md-offset-2 col-md-8 ">
    <div class="col-md-12">
      <h3>{{$user->name}}</h3>
    </div>
    <div class="col-md-12 ">
      @if (count($reviews) > 0)
        <ol class="statuses list-unstyled  text-left">
          @foreach ($reviews as $review)
            @include('reviews.show_review')
          @endforeach
        </ol>
        {!! $reviews->render() !!}
      @endif
    </div>
  </div>
</div>
@stop