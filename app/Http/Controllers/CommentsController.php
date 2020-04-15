<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth',['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request) {
        
  
        Comment::create([
            'content' =>$request->content,
            'post_id' => $request->post_id,
            'user_id'=> $request->user_id,
            'parent_id'=> $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Merci pour votre commentaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
      
        return view('comments.show')->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update([ 'content'=>$request->content,
         ]);
         return redirect()->back()->with('success', 'Votre modification a bien été enregistrée');
    }

    /**
     * Detruit le commentaire et ses enfants
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
       
        $comment->deleteLesEnfants($comment);
        return redirect()->back()->with('success', 'Suppression effectuée avec succés');

    }
}
