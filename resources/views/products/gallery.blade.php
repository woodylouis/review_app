<div class="container-fluid">
        <div class="row port-page">
        @foreach ($productPhotos as $productPhoto)
            <div class="gallery_product col-md-4 col-sm-4 col-xs-6 filter hdpe product-pics">
                <img src="{{url($productPhoto->filename)}}" class="img-responsive center-block port-image" alt="product image" width="150px" height="150px">
                Uploaded by {{$productPhoto->user_name}}
            </div> 
        @endforeach
  </div>
</div>

