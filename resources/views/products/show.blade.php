@extends('layouts.master')

@section('tagTitle')
    {{$product->product_name}}
@endsection

@section('content')
    
    <h1>{{$product->product_name}}</h1>
    <div class="product-detail">
        <p><em>Updated at {{$product->updated_at}}</em></p>
        <p>Brand: <strong>{{$product->manufacturer->manufacturer_name}}</strong></p>
        <p>Origin of Country: <strong>{{$product->manufacturer->country->country}}</strong></p>
        <p>Price: <strong>AU ${{$product->price}}</strong></p>
        <p>{{$product->product_description}}</p>
        
        @if(Auth::check() && Auth::user()->name == 'Moderator')
            <div class="text-right">
                <div class="d-inline-block py-2" data-toggle="tooltip" data-placement="top" title="Write review">
                    <a href="/product/{{$product->id}}#review-form"><img src="{{ asset('open-iconic/svg/plus.svg') }}" alt="icon edit" width='15' height='15'></a>
                </div>
                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Edit Product">
                    <a href="/product/{{$product->id}}/edit" class="pl-3"><img src="{{ asset('open-iconic/svg/pencil.svg') }}" alt="icon edit" width='15' height='15'></a>
                </div>
                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Delete">
                        <form method="POST" action="/product/{{$product->id}}">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <!--<input type="submit" value="Delete" class="btn bg text-light">-->
                            <button type="submit" class='delete-button'>
                                <img src="{{ asset('open-iconic/svg/delete.svg') }}" alt="icon delete" width='15' height='15'>
                            </button>
                        </form>
                </div>
            </div>
        @elseif(Auth::check() && Auth::user())
            <div class="text-right" data-toggle="tooltip" data-placement="top" title="Write review">
                <a href="/product/{{$product->id}}#review-form">Add review</a>
            </div>
        @endif
    </div>
    
    
    
    
    <div id='review'>
        <h2>Review</h2>
        @foreach ($reviews as $review)
            <div class="row no-gutters text-left product-review">
                    <div class="col-6 col-md-2 list-unstyled">
                        <li><a href="{{ route('user.show', $review->pivot->user_id )}}">{{$review->name}}</a></li>
                    </div>
                    <div class="col-12 col-sm-10 col-md-10 list-unstyled">
                        <li class='title'>{{$review -> pivot -> title}}</li>
                        <li class="rating">Rating: {{$review -> pivot -> rating}} of 5, on {{$review -> pivot -> created_at}}</li>
                        <li class="review-detail">{{$review -> pivot -> review_detail}}</li>
                        
                        <div class="d-inline-block" data-placement="top" title="Like this Review">
                            <form method="POST" action="/like">
                                {{csrf_field()}}
                                    <button type="submit" class='like-dislike mt-3 bg text-light' value="{{$review -> pivot -> id}}" name="review_id">
                                        Like
                                    </button>
                            </form>
                            
                        </div>
                        
                        <div class="d-inline-block" data-placement="top" title="Disike this Review">
                            <form method="POST" action="/dislike">
                                {{csrf_field()}}
                                    <button type="submit" class='like-dislike mt-3 bg text-light' value="{{$review -> pivot -> id}}" name="review_id">
                                        Disike 
                                    </button>
                            </form>
                        </div>
                        
                        
                        <!--This line of code allows admin to access all edit or delete action but the particular users can edit or delete their own reviews-->
                        @if((Auth::check() && Auth::user()->name == 'Moderator') | (Auth::check() && Auth::user()->id == $review -> pivot -> user_id))
                            <div class="text-right">

                                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Edit Review">
                                    <a href="/review/{{$review -> pivot -> id}}/edit"><img src="{{ asset('open-iconic/svg/pencil.svg') }}" alt="icon edit" width='15' height='15'></a>
                                </div>
                                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <form method="POST" action="/review/{{$review -> pivot -> id}}">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <!--<input type="submit" value="Delete" class="btn bg text-light">-->
                                            <button type="submit" class='delete-button'>
                                                <img src="{{ asset('open-iconic/svg/delete.svg') }}" alt="icon delete" width='15' height='15'>
                                            </button>
                                        </form>
                                </div>
                            </div>
                        
                        @endif
                    </div>
                    
            </div>
        @endforeach
        <!--Pagination-->
        {{ $reviews->links()}}
        
        
        
        @if(Auth::check() && Auth::user())
            <div id="review-form">
            <h2>Write a Review for {{$product->product_name}}</h2>    
                <div class="product-review">
                    <div class="panel-body">
                    
                        <form class="review-form" method="POST" action="/review">
                        {{ csrf_field() }}
                            <input type="hidden" name="product_id" value ='{{$product->id}}'>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label mt-4">Title of your review</label>
                                
                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control" name="title" placeholder="Example: This is perfect!!" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="rating" class="col-md-4 control-label mt-4">rating</label>
                                
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
                                <label for="review_detail" class="col-md-4 control-label mt-4">Your review</label>
                                
                                <div class="col-md-12">
                                <textarea id="review_detail" rows='5' type="review_detail" class="form-control" name="review_detail" value="{{ old('review_detail') }}" required></textarea>
                                
                                @if ($errors->has('review_detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('review_detail') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn bg text-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        
    </div>
@endsection