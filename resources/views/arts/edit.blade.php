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
                  Edit art listing
              </div>
              <div class="card-body">

                <form method="POST" action="{{route('art.update',$art->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group">
                            <label for="title">Title of artwork</label>
                        <input type="text" value='{{old('title')? old('title'): $art->title}}' name='title' required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of artwork</label>
                            <textarea name="description" required class='form-control'>
                                {{old('description') ? old('description'): $art->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price of artwork</label>
                            <input type="text" value='{{old('price') ? old('price'): $art->price}}' name='price' required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="seller_name">Name of seller</label>
                        <input type="text" name='seller_name' required value="{{old('seller_name')? old('seller_name'): $art->seller_name}}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Address of seller</label>
                        <input type="text" value='{{old('seller_address') ? old('seller_address'): $art->seller_address}}' name='seller_address' required required value="{{auth()->user()->address}}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Phone number of seller</label>
                        <input type="text" value='{{old('seller_phone') ? old('seller_phone'): $art->seller_phone}}' name='seller_phone' required value="{{auth()->user()->phone}}" required class="form-control">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" {{$art->negotiable==true?'checked':''}}  name='negotiable' class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Price is negotiable</label>
                          </div>

                          <div class="form-group py-2">
                              <label for="">Current Photo</label>
                          <img src="{{asset('uploads/'.$art->image)}}" alt="" class="img-fluid d-block">
                            <label for="title">Edit Photo of artwork</label>
                        <input type="file" name='image'  class="form-control-file">
                        </div>

                        <button class="btn-primary" type="submit">Update</button>

                    </form>

                            </div>
          </div>
        </div>
    </div>
</div>

@endsection
