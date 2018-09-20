@extends('layouts.master')
@section('tagTitle')
    Write a Review
@endsection

@section('content')
    <div class="edit-form col-md-5">
        <div class="col-md-12">
        <h2 class="col-md-6 ">Create a Review</h2>
        <div class="panel-body">
            
            <form class="form-horizontal" method="POST" action="#">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="product_name" class="col-md-4 control-label">Products</label>

                    <div class="col-md-12">
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="manufacturer">
                          @foreach($products as $product)
                            <option value="{{ $product -> id }}">{{ $product -> product_name }}</option>
                          @endforeach
                        </select> 

                        @if ($errors->has('product_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>    
                    

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">Title</label>

                    <div class="col-md-12">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

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
                        <input id="rating" type="rating" class="form-control" name="rating" value="{{ old('rating') }}" placeholder="1-5" min="1" max="5" required>

                        @if ($errors->has('rating'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rating') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('review_detail') ? ' has-error' : '' }}">
                    <label for="review_detail" class="col-md-4 control-label">Review Detail</label>

                    <div class="col-md-12">
                        <textarea id="review_detail" span='3' type="review_detail" class="form-control" name="review_detail" value="{{ old('review_detail') }}" required></textarea>

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
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>        
@endsection