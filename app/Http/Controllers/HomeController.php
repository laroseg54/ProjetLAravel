<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $posts = \App\Post::latest('created_at')->take(3)->get();
        
        return view('pages.welcome', array(
            'posts' => $posts
        ));

    }
}
