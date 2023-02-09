@extends('admin.base')

@section('readmore')
<div class="container mt-5">
    <div class="col">
        {{-- post --}}
        <div class="card">
                <div class="card-header">
                <h2 style="color:blue;" class="text-center">{{$data->title}}</h2>
                </div>
                    <div class="card-body">
                            <img class="card-img-top" src="{{asset('images/'.$data->image)}}" height="400px"  alt="Card image cap">
                                    <h5 class="card-title">
                                        {{$data->title}}
                                    </h5>
                                    <p>Post:- {{$data->created_at->format('d/m/y')}}  by: {{$data->userid->name}}</p>
                                <blockquote class="blockquote mb-0">
                                    <p>{{$data->description}}</p>
                                </blockquote>
                    </div>
                <hr>
                <div>
                    {{-- end post --}}

                    <div class="container">
                        <a href="{{route('admin')}}" class="btn btn-primary">Back</a>
                    </div>
{{-- like --}}
                    {{-- <div class="container">
                        Like 
                        <a href="{{route('like.post',$data->id)}}"><i class="fa fa-thumbs-up" style="font-size: 30px;color:black" aria-hidden="true"></i></a>
                        <p>Like : {{$like->count()}}</p> 
                       <form action="{{route()}}" method="post"></form>
                    </div> --}}
{{-- end like --}}
                        <hr>
{{-- share link --}}
                        <div class="container mt-4">
                            <h4>Share</h4>
                        {{-- {!! $shareComponent !!} --}}
                            <div id="social-links">
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{route('view.post',$data->id)}}" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('view.post',$data->id)}}" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{route('view.post',$data->id)}}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="https://wa.me/?text={{route('view.post',$data->id)}}" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li>    
                                </ul>
                            </div>
                        </div>
                    <hr>
                </div>
{{-- end share link --}}
{{-- form comment --}}  
            {{-- <div class="col-4 mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <h5><i class="fa fa-comment" style="font-size: 30px;" aria-hidden="true"></i> Comment</h5>
                                <input type="hidden" name="post_id" value="{{$data->id}}">
                                <input type="text" name="comment" id="" class="form-control">
                                @error('comment')
                                    <p style="color:red">{{$message}}</p>    
                                @enderror
                                <br>
                        <input type="submit" class="btn btn-primary" value="Comment"> 
                    </div>
                </form> --}}
            </div>
            {{-- post --}}
                    <div class="card-footer text-muted">
                    {{$data->created_at->format('d/m/y')}}
                    </div>
        </div>
    </div>
</div>

@endsection