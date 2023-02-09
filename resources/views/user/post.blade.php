@extends('user.base')
@section('title','Post')
@section('post')
<div class="container">
    <div class="col">
        <h1 class="text-center text-danger">Create Post</h1>
            {{-- @if(Session::has('success'))
                <div class="alert alert-primary" role="alert">
                    <h4>{{Session::get('success')}}</h4>
                </div>
            @endif --}}
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('create.post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title"class="form-control" placeholder="Enter City...">
                        @error('title')
                            <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        @error('description')
                            <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="file" class="form-control" placeholder="Enter Email...">
                        @error('file')
                            <p style="color:red">{{$message}}</p>
                        @enderror
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