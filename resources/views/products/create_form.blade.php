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
        
        
            <label for="formGroupExampleInput">Product Name:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Write Product Name Here" name="product_name">
            <br>
            <label>Price: </label>
            <input type="text" class="form-control" name="price" placeholder="Price">
            <br>
            <label for="formGroupExampleInput2">Description:</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Write Description Here" name="product_description">
            <br>
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Manufacturers</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="manufacturer">
              @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer -> id }}">{{ $manufacturer -> manufacturer_name }}</option>
              @endforeach
            </select>  
        
        
            
            <button type="submit" class="btn bg text-light mt-3">Create</button>
        </form>
    </div>
@endsection

