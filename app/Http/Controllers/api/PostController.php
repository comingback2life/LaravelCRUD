<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function getAllPosts(){
        $posts = Post::all();
        if($posts->count()>0){
            return response()->json([
                'status'=>200,
                'message'=>'Posts found',
                'posts'=>$posts,
            ]);
            }
        return response()->json([
            'status'=>404,
            'message'=>'No post found!'
        ],404);
    }

    public function addAPost(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=> 'required|string|max:191',
            'content'=> 'required|string',
            'author'=> 'required|string',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>200,
                'message'=>$validator->messages()
            ]);
        }else{
            $post= Post::create([
                'title'=>$request->title,
                'content'=>$request->content,
                'author'=>$request->author,
            ]);
        }

        if($post){
            return response()->json([
                'status'=>200,
                'message'=>'Post created succcesfully'
            ]);
        }

    }
}
