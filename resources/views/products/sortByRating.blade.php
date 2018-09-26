@extends('layouts.master')

@section('tagTitle')
    All products
@endsection

<!--all products list here-->
@section('content')
    <!--Site location navigation-->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb site-location">
        <li class="breadcrumb-item active" aria-current="page">All Products</li>
      </ol>
    </nav>
    
    <div class="btn-group site-location">
      <button type="button" class="btn bg text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort By
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/sortbyreviews">Most Reviews</a>
        <a class="dropdown-item" href="/sortbyrating">Rating</a>
      </div>
    </div><br>
    
    <div class="col-12 container">
      @foreach ($products as $product)
        
            
            <div class="shadow mb-2 bg-white rounded items row">
              <div class="col-md-2 d-none d-md-block py-2">
                <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">
              </div>
              <div class="col-sm-12 col-md-10 details">
                <ul class="list-unstyled">
                    <li class="list-item col-md py-2"><a href="{{url("product/$product->id")}}">{{ $product->product_name }}</a></li>
                    <!--If there is no rating, shows no rating-->
                    @if ($product->AvgRating == null)
                      <li class="list-item col-md py-2"> Rating: <strong>No Rating</strong></li>
                    @else
                      <li class="list-item col-md py-2"> Rating: {{$product->AvgRating}}<strong></strong> from <a href="{{url("product/$product->id")}}#review">{{$product->numberOfReview}} reviews</a></li>
                    @endif
                    <li class="list-item col-md py-2 product-description"><p>{{ $product->product_description }}</p></li>
                </ul>
              </div>
              
            </div>
          
      @endforeach

      
    </div>
    
    
@endsection