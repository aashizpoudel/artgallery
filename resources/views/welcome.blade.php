@extends('layouts.app')


@section('content')

<div class="container">
  @if(session('message'))
    <p class="alert alert-primary">
      {{session('message')}}
    </p>
  @endif
  <h1>Art Gallery</h1>
  <div class="row justify-content-center">
    @foreach($arts as $art)

    <div class="col-md-4">

      <div class="card p-2 rounded shadow">
        <img class="card-img img-fluid" style='max-height:300px' src="{{asset('uploads/'.$art->image)}}" alt="{{$art->title}}">
        
        <div class="card-body">
          <h4 class="card-title">{{$art->title}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">Seller Name: {{$art->seller_name}}</h6>
          <p class="card-text">
            {{$art->description}}

            <div class="buy d-flex justify-content-between align-items-center">
              <div class="price text-success">
                <h5 class="mt-4">Rs {{$art->price}}</h5>
              </div>
              <a href="/add_to_interest/{{$art->id}}" class="btn btn-danger mt-3"> Show Interest</a>


            </div>
            <div class="d-flex justify-content-center mt-3">
            <a href="tel:{{$art->seller_phone}}" class="btn rounded mt-3 btn-outline-warning"><i class="fas fa-call"></i> Call seller</a>

            </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection