<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{

    // admin
    public function admin_page()
    {
        if(Auth::check())
        {   
            
        $data=Post::where('status','Active')->orderBy('id','desc')->get();
            return view('admin.index',['data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
    }
    
    public function adminpostlist()
    {
        if(Auth::check())
        {   
            $data=Post::orderBy('id','desc')->get();
            return view('admin.adminpostlist',['data'=>$data]);
        }
        else
        {
            return redirect('/');
        }
    }

    public function confirm($id)
    {   
        if(Auth::check())
        {
            $data=Post::find($id);
            $data->status='Active';
            // dd($data);
            $data->save();
            return redirect('/post_list');
        }
    }
    public function cancel($id)
    {   
        if(Auth::check())
        {
            $data=Post::find($id);
            $data->status='Cancel';
            // dd($data);
            $data->save();
            return redirect('/post_list');
        }
    }

    public function admin_creat()
    {
        if(Auth::check())
        {
            return view('admin.create');
        }
        else
        {
            return redirect("/");
        }
    }

    public function admin_created_post(Request $request)
    {
        if(Auth::check())
        {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                // 'file'=>'required',
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
            $data->save();

            return redirect()->back()->with(['create'=>'Post Create Successfully']);
        }
        else
        {
            return redirect("/");
        }
    }

    public function admin_post_list()
    {
        if(Auth::check())
        {
            if(Auth::user()->id)
            {
                $user_id=Auth::user()->id;
                $data=Post::where('user_id',$user_id)->orderBy('id','desc')->get();
            }
            return view('admin.post_list',compact('data'));
        }
    }

    public function admin_edit_post($id)
    {
        if(Auth::check())
        {   
            $data=Post::find($id);
            
            return view('admin.admin_edit',compact('data'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function admin_update_post(Request $request,$id)
    {
        if(Auth::check())
        {
            $data=Post::find($id);
            $data->title=$request->title;
            $data->description=$request->description;
            
            if($request->hasFile('file'))
            {
                // dd($data->image);
                if($old=$data->image)
                {
                    $image=File::delete($old);
                    // dd($image);
                    $imageName = 'Img'.time().'.'.$request->file->extension();
                    $request->file->move(public_path('images'),$imageName);
                    $data->image=$imageName;
                }
            }
            $data->update();
            return redirect()->back()->with(['update'=>'Post Update Successfully...']);
        }
        else
        {
            return redirect('/');
        }
    }

    public function admin_post_delete($id)
    {
        if(Auth::check())
        {
            $data=Post::find($id);
            $data->delete();
            return redirect()->back()->with(['delete'=>'Post Deleted Successfully']);
        }
        else
        {
            return redirect('/');
        }
    }

    public function admin_read_more(Request $request, $id)
    {
        if(Auth::check())
        {   
            $data=Post::find($id);
            
            return view('admin.admin_read',compact('data'));
        }
    }


}
