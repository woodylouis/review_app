@extends('layouts.master')
@section('tagTitle')
    Update {{$product -> product_name}} Review
@endsection

@section('content')
    
        <h2>Update {{$product -> product_name}} Review</h2>
        
            
            <form class="form-horizontal" method="POST" action="/review/{{$review->id}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>

                        <input id="title" type="text" class="form-control" name="title" value="{{$review->title, old('title') }}">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                </div>
                    
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="rating" class="control-label">rating</label>

                        <input id="rating" type="rating" class="form-control" name="rating" value="{{$review->rating, old('rating') }}">

                        @if ($errors->has('rating'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rating') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('review_detail') ? ' has-error' : '' }}">
                    <label for="review_detail" class="control-label">review_detail</label>

                        <textarea id="review_detail" rows="3" type="review_detail" class="form-control" name="review_detail" autofocus>{{$review->review_detail, old('review_detail') }}</textarea>

                        @if ($errors->has('review_detail'))
                            <span class="help-block">
                                <strong>{{ $errors->first('review_detail') }}</strong>
                            </span>
                        @endif
                </div>

                

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn bg btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
                
@endsection