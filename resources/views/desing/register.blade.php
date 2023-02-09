@extends('desing.base')
@section('title','BlogPost')
@section('form')
    <div class="container">
        <div class="col">
            <h1 class="text-center text-danger">Register Form</h1>
            @if(Session::has('success'))
            <div class="alert alert-primary" role="alert">
                <h4>{{Session::get('success')}}</h4>
            </div>
            @endif
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="{{url('/register')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name"class="form-control" placeholder="Enter name...">
                            @error('name')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" name="city"class="form-control" placeholder="Enter City...">
                            @error('city')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="number" name="mobile"class="form-control" placeholder="Enter Mobile no. ...">
                            @error('mobile')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email"class="form-control" placeholder="Enter Email...">
                            @error('email')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password...">
                            @error('password')
                                <p style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="form-control btn btn-primary" placeholder="Enter name...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
