@extends('layouts.master')
@section('tagTitle')
    Edit {{$product->manufacturer->manufacturer_name}} {{$product->product_name}}
@endsection

@section('content')
    <h1>Edit {{$product->manufacturer->manufacturer_name}} {{$product->product_name}}</h1>
    
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
        <form method="POST" action="/product/{{$product->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
            <label>Name:</label>
            <input type="text" name="product_name" class="form-control" value="{{$product->product_name, old('product_name')}}"><br>
            <label>Price:</label>
            <input type="text" name="price" class="form-control" value="{{$product->price ,old('product_name')}}"><br>
            <label>Manufacturer:</label>
            <select name="manufacturer" class="form-control">
            @foreach ($manufacturers as $manufacturer)
                @if($manufacturer->id === $product->manufacturer_id)
                <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->manufacturer_name}}</option>
                @else
                <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                @endif
            @endforeach
            </select>
            <br>
            <label>Description:</label>
            <textarea type="text" class="form-control" rows="5" name="product_description">{{$product->product_description}}</textarea>
            <button type="submit" class="btn bg text-light mt-3">Update</button>
        </form>
    </div>
@endsection