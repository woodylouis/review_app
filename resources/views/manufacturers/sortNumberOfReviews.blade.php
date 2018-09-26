@extends('layouts.master')

@section('tagTitle')
    All Products
@endsection

@section('content')
    <div class="col-12 container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Products</li>
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
                  <div class="text-left sortby">
                    <button type="button" class="btn bg text-white dropdown-toggle" data-toggle="dropdown">
                      Sort By
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/sortNumberOfReviews">Most Reviews</a>
                      <a class="dropdown-item" href="/sortAverageRating">Rating</a>
                      <a class="dropdown-item" href="/sortBrand">Brands</a>
                    </div>
                  </div>    

                  
                  @foreach ($products as $product)
                  <div class="mb-2 mt-5 bg-white row items details">
                    <div class="col-md-2 d-none d-md-block py-2">
                      <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">
                    </div>
                    <div class="col-sm-12 col-md-10 details">
                      <ul class="list-unstyled">
                          <li class="list-item col-md py-2 title"><a href="{{url("product/$product->id")}}">{{ $product->product_name }}</a></li>
                          @if ($product->AvgRating == null)
                            <li class="list-item col-md py-2"> Rating: <strong>No Rating</strong></li>
                          @else
                             <li class="list-item col-md py-2"> Rating: <strong>{{number_format($product->AvgRating)}}</strong> from <a href="{{url("product/$product->id")}}#review"><strong>{{$product->numberOfReview}}</strong> reviews</a></li>
                          @endif
                          <li class="list-item col-md py-2 product-description"><p><strong>Description: </strong>{{ $product->product_description }}</p></li>
                      </ul>
                    </div>
                 </div>
                 @endforeach
                 <!--Pagination-->
                 {{ $products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

