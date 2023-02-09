@extends('admin.base')
@section('title','BlogPost')
@section('index')
<div class="container mt-5">
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
              <td>{{Str::limit($data->description,20)}}
                <a href="{{route('admin.read',$data->id)}}" class="btn btn-info">Read more...</a>
              </td>
             
                  @if ($data->status=="Active")
                      <td style="color:blue"><i class="fa fa-check" style="color:green;" aria-hidden="true"></i></td>
                  @elseif($data->status=="Cancel")
                      <td style="color:red"><i class="fa fa-ban" style="color: red;" aria-hidden="true"></i></td>
                  @else
                      <td>Verified?</td>
                  @endif
          </tr>
      </tbody>
      @endforeach
    </table>
</div>

@endsection
