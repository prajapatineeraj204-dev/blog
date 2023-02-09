<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function post()
    {
        if(Auth::check())
        {
            return view('user.post');
        }
        else
        {
            return redirect('/');
        }
    }

    public function create_post(Request $request)
    {   
        if(Auth::check())
        {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'file'=>'required|image'
            ]);

            $data=new Post();
            $img='Img'.time().'.'.$request->file->extension();
            $data->image= $img;
            if($request->hasFile('file')){
            $imageName = 'Img'.time().'.'.$request->file->extension();
            $request->file->move(public_path('images'), $imageName);        
            }
            $data->title=$request->title;
            $data->description=$request->description;
            $data->status="Verified?";
            if(Auth::check())
            {
                $data->user_id=Auth::id();
            }
            // dd($data);
            $data->save();
            return redirect()->back()->with(["success"=>"Post Successfully!!!"]);
        }
        else
        {
            return redirect('/');
        }
        return redirect('/');
    }

    public function post_list()
    {
        if(Auth::check())
        {   
            if(Auth::id())
            {
                $user_id=Auth::user()->id;
                $data=Post::where('user_id',$user_id)->orderBy('id','desc')->get();
            }
            return view('user.postlist',['data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function post_delete($id)
    {
        if(Auth::check())
        {   
            $data=Post::find($id);
            $data->delete();
            return redirect()->back()->with(['success'=>"Deleted Successfully!!!"]);
        }
        else
        {
            return redirect('/');
        }
    }

    

}
