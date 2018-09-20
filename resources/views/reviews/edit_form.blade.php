@extends('layouts.master')
@section('tagTitle')
    Update a Review
@endsection

@section('content')
    <div class="edit-form col-md-5">
        <div class="col-md-12">
        <h2 class="col-md-4 ">Update</h2>
        <div class="panel-body">
            
            <form class="form-horizontal" method="POST" action="#">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">Title</label>

                    <div class="col-md-12">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                    
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="rating" class="col-md-4 control-label">rating</label>

                    <div class="col-md-12">
                        <input id="rating" type="rating" class="form-control" name="rating">

                        @if ($errors->has('rating'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rating') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('review_detail') ? ' has-error' : '' }}">
                    <label for="review_detail" class="col-md-4 control-label">review_detail</label>

                    <div class="col-md-12">
                        <textarea id="review_detail" span='3' type="review_detail" class="form-control" name="review_detail" value="{{ old('review_detail') }}"></textarea>

                        @if ($errors->has('review_detail'))
                            <span class="help-block">
                                <strong>{{ $errors->first('review_detail') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn bg btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>        
@endsection