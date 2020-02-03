@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-warning">:message</div>')) !!}
@endif

            @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
            @endif
          <div class="card">
              <div class="card-header">
                  Create new art listing
              </div>
              <div class="card-body">

                <form method="POST" action="{{route('art.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title of artwork</label>
                        <input type="text" value='{{old('title')}}' name='title' required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of artwork</label>
                            <textarea name="description" required class='form-control'>
                                {{old('description')}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price of artwork</label>
                            <input type="text" value='{{old('price')}}' name='price' required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="seller_name">Name of seller</label>
                        <input type="text" name='seller_name' required value="{{auth()->user()->name}}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Address of seller</label>
                        <input type="text" value='{{old('seller_address')}}' name='seller_address' required required value="{{auth()->user()->address}}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Phone number of seller</label>
                        <input type="text" value='{{old('seller_phone')}}' name='seller_phone' required value="{{auth()->user()->phone}}" required class="form-control">
                        </div>

                        <div class="form-check">
                            <input type="checkbox"  name='negotiable' class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Price is negotiable</label>
                          </div>

                          <div class="form-group">
                            <label for="title">Photo of artwork</label>
                        <input type="file" name='image' required  class="form-control-file">
                        </div>

                        <button class="btn-primary" type="submit">Create</button>

                    </form>

                            </div>
          </div>
        </div>
    </div>
</div>

@endsection
