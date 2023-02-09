@extends('user.base')
@section('edit')

<div class="container">
    <div class="col">
        <h1 class="text-center text-danger">Update Post</h1>
            @if(Session::has('success'))
                <div class="alert alert-primary" role="alert">
                    <h4>{{Session::get('success')}}</h4>
                </div>
            @endif
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('update.post',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" value="{{$data->title}}" name="title"class="form-control" placeholder="Enter City...">
                        @error('title')
                            <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$data->description}}</textarea>
                        @error('description')
                            <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <img src="{{asset($data->image)}}" width="100px" height="100px" name="file" alt="">
                        <input type="file" name="file" class="form-control" placeholder="Enter Email...">
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Post" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection