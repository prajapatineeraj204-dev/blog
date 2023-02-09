<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment_post(Request $request,$id)
    {
        if(Auth::check())
        {   
            $request->validate([
                'comment'=>'required',
            ]);
            $data=Post::find($id);
            $data=new Comment();
            $data->comment=$request->comment;
            if(Auth::id())
            {
                $data->user_id=Auth::id();
            }
            $data->post_id=$request->post_id;
            $data->save();
            // dd($data);
            

            return redirect()->back()->with(['$data'=>$data]);
        }
        return redirect('/');
    }


    

}
