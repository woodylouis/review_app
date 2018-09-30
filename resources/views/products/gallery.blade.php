<div class="container-fluid">
        <div class="row port-page">
        @foreach ($productPhotos as $productPhoto)
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="{{url($productPhoto->filename)}}" class="img-responsive center-block port-image" alt="product image">
                Uploaded by {{$productPhoto->user_name}}
            </div>
        @endforeach
  </div>
</div>