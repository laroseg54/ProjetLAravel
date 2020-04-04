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
        
    
       
        Comment::create([
            'content' =>$request->content,
            'post_id' => $request->post_id,
            'user_id'=> $request->user_id
        ]);

        return redirect()->back()->with('success', 'Merci pour votre commentaire');
    }

   
}
