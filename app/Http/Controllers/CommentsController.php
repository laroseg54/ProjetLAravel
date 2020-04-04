<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function store(CommentRequest $request) {
        $post = Post::find($request->post_id); 

        Comment::create([
            'content' =>$request->content,
            'post_id' => $post->id
        ]);

        return back();
    }

   
}
