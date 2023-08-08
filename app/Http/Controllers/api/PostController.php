<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getAllPosts(){
        $posts = Post::all();
        if($posts->count()>0){
            return response()->json([
                'status'=>200,
                'message'=>'Posts found'
            ]);
            }
        return response()->json([
            'status'=>404,
            'message'=>'No post found!'
        ],404);
    }
}
