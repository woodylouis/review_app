@extends('layouts.master')

@section('tagTitle')
    {{$product->product_name}}
@endsection

@section('content')
    <h1>{{$product->product_name}}</h1>
    <div>
        <p>Brand: <strong>{{$product->manufacturer->manufacturer_name}}</strong></p>
        <p>Origin of Country: <strong>{{$product->manufacturer->country->country}}</strong></p>
        <p>Price: AU ${{$product->price}}</p>
        <p>{{$product->product_description}}</p>
        
        @if(Auth::check() && Auth::user()->name == 'admin')
            <p><a href='/product/{{$product->id}}/edit'>Edit</a></p>
            <p>
                <form method="POST" action="/product/{{$product->id}}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete" class="btn bg text-light">
                </form>
            </p>
        @endif
    </div>
@endsection