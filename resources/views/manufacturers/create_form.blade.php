@extends('layouts.master')
@section('tagTitle')
    Create a Manufacturer
@endsection

@section('content')
    <h1>Create a Manufacturer</h1>
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
        <form method="POST" action="/manufacturer">
        {{csrf_field()}}
        
        
            <label for="formGroupExampleInput">Manufacturer:</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Write Manufacturer Name Here" name="manufacturer_name">
            <br>
            
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Country</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="country">
              @foreach($countries as $country)
                <option value="{{ $country -> id }}">{{ $country -> country }}</option>
              @endforeach
            </select>  
        
        
            
            <button type="submit" class="btn bg text-light mt-3">Create</button>
        </form>
    </div>
@endsection

