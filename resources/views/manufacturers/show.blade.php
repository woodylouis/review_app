@extends('layouts.master')

@section('tagTitle')
    {{$manufacturer->manufacturer_name}}
@endsection

@section('content')
    <div class="col-12 container">
        <h1>{{$manufacturer->manufacturer_name}}</h1>
        <strong>{{$manufacturer->country->country}}</strong>
        <br>
        <div class="list-unstyled">
            @foreach ($products as $product)
                <li><a href="{{url("product/$product->id")}}">{{ $product -> product_name }}</a></li>
            @endforeach
        </div>
    </div>
@endsection