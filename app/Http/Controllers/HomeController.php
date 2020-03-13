<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
     /*try{
        var_dump(\App\Post::get());die();
        
    }catch (Exception $e) {
            echo ($e);
    
            
        }*/
        
         $posts = \App\Post::latest('created_at')->take(3)->get();
        
         return view('pages.welcome', array(
             'posts' => $posts
         ));

        
//          $posts = \App\User::find(1)->posts; //get posts from user id 1
//          foreach ($posts as $post) {
//                 echo $post->post_content;
// }


        //return view('pages.welcome')->with('title', $title);
    }

}
