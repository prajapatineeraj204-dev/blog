@extends('desing.base')
@section('title','BlogPost')
@section('login')
<div class="container">
    <div class="col">
        <h1 class="text-center text-danger">Login Form</h1>
    </div>
        @if(Session::has('read'))
            <div class="alert alert-danger" role="alert">
                <h4>{{Session::get('read')}}</h4>
            </div>
        @endif
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{url('/login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email...">
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
                        <input type="submit" name="" value="Login" class="form-control btn btn-primary" placeholder="Enter name...">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
