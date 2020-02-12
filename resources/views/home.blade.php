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
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>

                        <div class="col-md-6">
                            <h3>Interested Users on my arts</h3>
                            <div class="list-group my-4">
                                @foreach ($interests as $interest)
                                <li class="list-group-item">
                                    <a href="{{route('user.show',$interest->user->id)}}">{{$interest->user->name}}</a> was interested on your <a href="{{route('art.show',$interest->art->id)}}">{{$interest->art->title}}</a>

                                </li>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('interest.index')}}" class="btn btn-lg btn-warning">Arts I am interested on</a>

                    <a href="{{route('art.create')}}" class="btn btn-lg btn-warning">Add my art</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection