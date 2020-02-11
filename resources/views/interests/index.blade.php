@extends("layouts.app")



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Arts I am interested on
                </div>
                <div class="card-body">



                    @if($interests->count()>0)
                    @foreach($interests as $interest)

                    <li class="list-group-item">
                        <a href="#">{{$interest->user->name}}</a> is interested on <a href="#">{{$interest->art->title}}</a>
                    </li>

                    @endforeach

                    @else
                    <p class="alert alert-primary">You are not interested on any arts. Please browse on <a href="/">homepage</a>
                    </p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection