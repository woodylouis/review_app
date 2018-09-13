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
      
      <div class="shadow mb-2 bg-white rounded items row">
        
        <div class="col-md-2 d-none d-md-block py-2">
          <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">
        </div>
        
        <div class="col-sm-12 col-md-10 details">
          <ul class="list-unstyled">
            <li class="list-item col-md py-2"><a href="productid">iPhone 8 Plus</a></li>
            <li class="list-item col-md py-2"> Rating: <strong>5</strong> from <a href="productid">5 reviews</a></li>
            <li class="list-item col-md py-2 product-description"><p>A New Generation Of iPhone. Order Online or Buy In Store Today! Shop with Confidence. Secure Online Shopping. Highlights: Customer Service Available, Financing Options Available, Safe & Secure Shopping, Multiple Payment Options Available.</p></li>
          </ul>
        </div>
        
      </div>
          
      <div class="shadow mb-2 bg-white rounded items row">
        
        <div class="col-md-2 d-none d-md-block py-2">
          <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">
        </div>
        
        <div class="col-sm-12 col-md-10 details">
          <ul class="list-unstyled">
            <li class="list-item col-md py-2"><a href="productid">iPhone 8 Plus</a></li>
            <li class="list-item col-md py-2"> Rating: <strong>5</strong> from <a href="productid">5 reviews</a></li>
            <li class="list-item col-md py-2 product-description"><p>A New Generation Of iPhone. Order Online or Buy In Store Today! Shop with Confidence. Secure Online Shopping. Highlights: Customer Service Available, Financing Options Available, Safe & Secure Shopping, Multiple Payment Options Available.</p></li>
          </ul>
        </div>
        
      </div>
      

      
    </div>
    
    
@endsection