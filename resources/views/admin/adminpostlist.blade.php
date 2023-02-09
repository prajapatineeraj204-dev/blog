@extends('admin.base')
@section('adminpost')
    
<div class="container mt-5">
    <div>
        <h1 class="text-center">Post List Details</h1>
    </div>
            @if(Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    <h4>{{Session::get('success')}}</h4>
                </div>
            @endif
    <table class="table table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Confirm</th>
            <th scope="col">Cancel</th>
          </tr>
        </thead>
        @foreach($data as $data)
        <tbody>
             <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <img src="images/{{$data->image}}" width="100px" height="100px">
                </td>
                <td>{{$data->userid->name}}</td>
                <td>{{Str::limit($data->title,20)}}</td>
                <td>{{Str::limit($data->description,20)}}</td>
                <td>{{$data->created_at->format('d/m/y')}}</td>
                    @if ($data->status=="Active")
                    <td style="color:blue"><i class="fa fa-check" style="color:green;font-size:25px"></i></td>
                    @elseif($data->status=="Cancel")
                    <td style="color:blue"><i class="fa fa-ban" style="color:red;font-size:25px"></i></td>
                    @elseif($data->status=="Update")
                        <td>Update</td>
                    @else
                        <td><i class="fa fa-question" style="font-size: 30px;" aria-hidden="true"></i></td>
                    @endif
                <td>
                    <a href="{{route('admin.confirm',$data->id)}}" class="btn btn-success">Confirm</a>
                </td>
                <td>
                    <a href="{{route('admin.cancel',$data->id)}}" class="btn btn-danger">Cancel</a>            
                </td>
            </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection