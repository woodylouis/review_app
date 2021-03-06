@extends('layouts.master')
@section('tagTitle')
    Write a Review
@endsection

@section('content')
    <h2 class="#">Create a Review</h2>
    <div class="#">
        <div class="#">
        

            <form class="form-group" method="POST" action="/review">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="product_name" class="control-label">Products</label>

                    <div class="#">
                        <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref" name="product_id">
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
                    <label for="title" class="control-label">Title</label>

                    <div class="#">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                    
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="rating" class="control-label">Rating</label>

                    <div class="#">
                        <input id="rating" type="rating" class="form-control" name="rating" value="{{ old('rating') }}" placeholder="1-5" min="1" max="5" required>

                        @if ($errors->has('rating'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rating') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('review_detail') ? ' has-error' : '' }}">
                    <label for="review_detail" class="control-label">Review Detail</label>

                    <div>
                        <textarea id="review_detail" span='3' type="review_detail" class="form-control" name="review_detail" value="{{ old('review_detail') }}" required></textarea>

                        @if ($errors->has('review_detail'))
                            <span class="help-block">
                                <strong>{{ $errors->first('review_detail') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn bg text-light mt-4">
                    Submit
                </button>
                    
                
            </form>
        </div>
    </div>        
@endsection