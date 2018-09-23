@extends('layouts.master')

@section('tagTitle')
    All Manufacturers
@endsection

@section('content')
    <div class="col-12 container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Manufacturers</li>
          </ol>
        </nav>
        <div class="container">
            
            <div class="row">
                <div class="col-md-2 d-none d-md-block col-sm">
                <h4>Brands:</h4>
                @if($manufacturers)
                    <ul class="brand list-unstyled">
                    @foreach ($manufacturers as $manufacturer)
                        <div>
                            <li class = "py-2"><a href="{{url("manufacturer/$manufacturer->id")}}">{{ $manufacturer -> manufacturer_name }}</a></li>
                        </div>
                    @endforeach
                    </ul>
                @else
                    No Manufacturer found
                @endif
                </div>
        
                <div class="col-sm">
                  <h2 class='text-left'>All Products</h2>
                  
                  @foreach ($products as $product)
                  <div class="mb-2 bg-white row items details">
                    <div class="col-md-2 d-none d-md-block py-2">
                      <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">
                    </div>
                    <div class="col-sm-12 col-md-10 details">
                      <ul class="list-unstyled">
                          <li class="list-item col-md py-2 title"><a href="{{url("product/$product->id")}}">{{ $product->product_name }}</a></li>
                          @if ($product->AvgRating == null)
                            <li class="list-item col-md py-2"> Rating: <strong>No Rating</strong></li>
                          @else
                             <li class="list-item col-md py-2"> Rating: <strong>{{$product->AvgRating}}</strong> from <a href="{{url("product/$product->id")}}#review"><strong>{{$product->numberOfReview}}</strong> reviews</a></li>
                          @endif
                          <li class="list-item col-md py-2 product-description"><p><strong>Latest Review: </strong>{{ $product->product_description }}</p></li>
                      </ul>
                    </div>
                 </div>
                 @endforeach
                 
                 {{ $products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

