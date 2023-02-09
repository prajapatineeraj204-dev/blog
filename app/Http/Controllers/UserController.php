<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class UserController extends Controller
{
    public function index()
    {
        $data=Post::where('status','Active')->orderBy('id','desc')->get();   
        return view('desing.index',['data'=>$data]);
    }
    public function register()
    {
        return view('desing.register');
    }
    public function login()
    {
        return view('desing.login');
    }

    public function post_view(Request $request, $id)
    {
        if(Auth::check())
        {
            $da=Post::find($id);
            $comment=Comment::where('post_id',$id)->orderBy('id','desc')->get();
            $shareComponent=\Share::page("")->facebook()->twitter()->linkedin()->telegram()->whatsapp();
            $like=Like::where('post_id',$id)->get();

            return view('user.view_post',['data'=>$da,"comment"=>$comment,'shareComponent'=>$shareComponent,"like"=>$like]);
        }
    }

    public function like(Request $request,$id)
    {
        if(Auth::check())
            {
                $user=Auth::user()->id;
                $data=Like::where('post_id',$id)->first();
                
                if($data ==''){
                    $like=Like::create([
                        'post_id'=>$id,
                        'like'=>$user,
                        'user_id'=>$user,
                    ]);
                    return back();
                }else{
                    if($data->post_id == $id){
                        if($data->like == $user){
                            $unlike=Like::find($data->id)->delete();
                            return back();
                        }else{
                            if($data->like != $user){
                                $like=Like::create([
                                    'post_id'=>$id,
                                    'like'=>$user,
                                    'user_id'=>$user,
                                ]);
                                return back(); 
                            }
                        }
                    }
                }

            }
           
    }

    public function create_register(Request $request)
    {
        $validatin=$request->validate([
            'name'=>'required',
            'city'=>'required',
            'mobile'=>'required|min:10',
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $data=new User();
        $data->name=$request->name;
        $data->city=$request->city;
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->save();
        return back()->with(['success'=>'Registration Successfully!!!']);
    }



// user
    public function user_page()
    {
        if(Auth::check())
        {   
            if(Auth::id())
            {
                $user_id=Auth::user()->id;
                $data=Post::where('user_id',$user_id)->get();
            }
            $data=Post::where('status','Active')->orderBy('id','desc')->get();
            return view('user.index',['data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
    }



    public function create_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            if(Auth::user()->role=='admin')
            {
                return redirect('/admin')->with(['success'=>'Login Successfully!!!']);
            }
            else
            {
                return redirect('/user')->with(['success'=>"Login Successfully!!!"]);
            }
        }
        else
        {
            return redirect('/login')->with(['success'=>'Please!!!  You created registration for login in BlogPost']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("/")->with(['success'=>"Logout Successfully!!!"]);
    }

    public function edit($id)
    {
        if(Auth::check())
        {
            $data=Post::find($id);
            return view('user.edit',compact('data'));
        }
        else{
            return redirect('/');
        }
    }

    public function update(Request $request,$id)
    {
        if(Auth::check())
        {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                
            ]);
            $data=Post::find($id);
            $data->title=$request->title;
            $data->description=$request->description;

            if($request->hasFile('file')){
                // ddx($data->image);
                if($oldimg=$data->image){
                  File::delete($oldimg);
                  $imageName = 'Img'.time().'.'.$request->file->extension();
                  $request->file->move(public_path('images'),$imageName);
                  $data->image=$imageName;
                }
            }
                $data->status="Update";
            if(Auth::check())
            {
                $data->user_id=Auth::id();
            }
            $data->update();
            return redirect("list/")->with(['success'=>'Post Update Successfully']);
        }
        else
        {
            return redirect('/');
        }
    }

    public function readmore()
    {
        return redirect('/login')->with(['read'=>'Please login for read...']);
    }




    
    




}
