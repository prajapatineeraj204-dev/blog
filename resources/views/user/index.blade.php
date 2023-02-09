@extends('user.base')
@section('title','BlogPost')
@section('heading')
<div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    @foreach ($data as $data)
                    <div class="card">
                    <img class="card-img-top" src="images/{{$data->image}}" width="300px" height="300px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->title}}</h5>
                            <p>Post By : {{$data->userid->name}}</p>
                            <p class="card-text">{{Str::limit($data->description,50)}}</p>
                            <strong>{{$data->created_at->format('d/m/y')}}  </strong>
                            <a class="btn btn-primary" href="{{route('view.post',$data->id)}}">Read...</a> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    

@endsection
