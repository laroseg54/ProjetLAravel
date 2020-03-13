<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function articles() {

        $posts = \App\Post::all();
        $posts= $posts->where('post_type','=','article');

        $data = array(
            'articles'->$posts
        );
        return view('pages.articles')->with($data); 
    }
}
