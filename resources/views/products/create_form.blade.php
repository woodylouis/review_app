@extends('layouts.master')
@section('tagTitle')
    Create Products
@endsection

@section('content')
    <h1>Create a new Product</h1>
    @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="form-group">
        <form method="POST" action="/product">
        {{csrf_field()}}
        
            <div class="form-group">
                <label>Product Name:</label>
                <input type="text" class="form-control" placeholder="Write Product Name Here" name="product_name" value="{{old('product_name')}}" required>
            </div>
            
            <div class="form-group">
                <label>Price: </label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="{{old('price')}}">
            </div>
            <!--<label for="formGroupExampleInput2">Description:</label>-->
            <!--<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Write Description Here" name="product_description">-->
            
            <div class="form-group">
                <label>Description: </label>
                <textarea class="form-control" placeholder="Write Description Here" rows="3" name="product_description" required> {{ old('product_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Manufacturers</label>
                <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref" name="manufacturer">
                  @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer -> id }}">{{ $manufacturer -> manufacturer_name }}</option>
                  @endforeach
                </select>  
            </div>
        
        
            
            <button type="submit" class="btn bg text-light mt-3">Create</button>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
        });
    });
    </script>

@stop