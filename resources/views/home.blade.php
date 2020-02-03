@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class=''>
                        <h3>My listings</h3>
                        <div class="list-group my-4">
                          @foreach ($arts as $art)
                              <li class="list-group-item">
                              <a href="#">{{$art->title}}</a>
                              <span class='float-right'>
                              <a href="{{route('art.edit',$art->id)}}" class="btn btn-primary mb-2">Edit</a>
                              <form class='form-row' action="{{route('art.destroy',$art->id)}}" method='post'>
                                @method('delete')
                                @csrf
                                <button type="submit" class='btn btn-danger'>Delete</button>
                            </form>
                              </span>
                              </li>
                          @endforeach

                        </div>
                        {{$arts->links()}}
                    </div>
                <a href="{{route('art.create')}}" class="btn btn-primary">Create new listing</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
