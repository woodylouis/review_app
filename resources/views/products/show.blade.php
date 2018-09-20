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
        <p>Price: AU ${{$product->price}}</p>
        <p>{{$product->product_description}}</p>
        
        @if(Auth::check() && Auth::user()->name == 'Moderator')
            <div class="text-right">
                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Edit Product">
                    <a href="/product/{{$product->id}}/edit"><img src="{{ asset('open-iconic/svg/pencil.svg') }}" alt="icon edit" width='15' height='15'></a>
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
        @endif
    </div>
    
    
    <div class="text-right" >
        
    </div>
    
    
    
    <div id='review'>
        <h2>Review</h2>
        
        @foreach ($reviews as $review)
            <div class="row no-gutters text-left product-review">
                    <div class="col-6 col-md-2 list-unstyled">
                        <li><a href='#'>{{$review->name}}</a></li>
                    </div>
                    <div class="col-12 col-sm-10 col-md-10 list-unstyled">
                        <li><h3>{{$review -> pivot -> title}}</h3></li>
                        <li class="rating">Rating: {{$review -> pivot -> rating}} of 5, on {{$review -> pivot -> created_at}}</li>
                        <li class="review-detail">{{$review -> pivot -> review_detail}}</li>
                        
                        <!--This line of code allows admin to access all edit or delete action but the particular users can edit or delete their own reviews-->
                        @if((Auth::check() && Auth::user()->name == 'Moderator') | (Auth::check() && Auth::user()->id == $review -> pivot -> user_id))
                            <div class="text-right">
                                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Edit Product">
                                    <a href="/review/{{$review->id}}/edit"><img src="{{ asset('open-iconic/svg/pencil.svg') }}" alt="icon edit" width='15' height='15'></a>
                                </div>
                                <div class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <form method="POST" action="/review/{{$review->id}}">
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
    </div>
@endsection