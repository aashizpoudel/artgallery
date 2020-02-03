@extends('layouts.app')


@section('content')

<div class="container">
    <h1>Art Gallery</h1>
<div class="row justify-content-center">
    @foreach($arts as $art)

    <div class="col-md-3">

        <div class="card">
        <img class="card-img img-fluid" style='max-height:300px' src="{{asset('uploads/'.$art->image)}}" alt="{{$art->title}}">
            <div class="card-img-overlay d-flex justify-content-end">
              <a href="#" class="card-link text-danger like">
                <i class="fas fa-heart"></i>
              </a>
            </div>
            <div class="card-body">
              <h4 class="card-title">{{$art->title}}</h4>
            <h6 class="card-subtitle mb-2 text-muted">Seller Name: {{$art->seller_name}}</h6>
              <p class="card-text">
                {{$art->description}}

              <div class="buy d-flex justify-content-between align-items-center">
                <div class="price text-success"><h5 class="mt-4">Rs {{$art->price}}</h5></div>
              <a href="tel:{{$art->seller_phone}}" class="btn btn-danger mt-3"><i class="fas fa-call"></i> Call Seller</a>
              </div>
            </div>
          </div>
    </div>
    @endforeach

</div>
</div>

@endsection
