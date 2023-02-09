@extends('desing.base')
@section('title','BlogPost')
@section('heading')
  <div class="container mt-5">
    <div>
        <div class="col">
            <div class="card-deck">
                @foreach ($data as $data)
                <div class="card">
                <img class="card-img-top" src="images/{{$data->image}}"" width="300px" height="300px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$data->title}}</h5>
                        <p class="card-text">{{Str::limit($data->description,30)}}</p>
                        <strong>{{$data->created_at}}</strong>
                        <hr>
                        <a href="{{route('login.page')}}" class="btn btn-info">Read more...</a>

                    </div>
                </div>
                @endforeach    
            </div>
        </div>
    </div>
</div>

@endsection
