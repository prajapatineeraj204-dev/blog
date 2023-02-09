@extends('admin.base')

@section('title','Admin Post List')
@section('admin_list_post')
<div class="container mt-5">
    <div>
        <h1 class="text-center">Post List Details</h1>
    </div>
            @if(Session::has('delete'))
                <div class="alert alert-danger" role="alert">
                    <h4>{{Session::get('delete')}}</h4>
                </div>
            @endif
    <table class="table table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Date</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        @foreach($data as $data)
        <tbody>
             <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->created_at->format('d/m/y')}}</td>
                <td>
                    <img src="images/{{$data->image}}" width="100px" height="100px">
                </td>
                <td>{{$data->userid->name}}</td>
                <td>{{Str::limit($data->title,20)}}</td>
                <td>{{Str::limit($data->description, 30)}}</td>
                <td>{{$data->status}}</td>
                <td>
                    <a href="{{route('admin.edit.post',$data->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a href="{{route('admin.post.delete',$data->id)}}" class="btn btn-danger">Delete</a>            
                </td>
            </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection