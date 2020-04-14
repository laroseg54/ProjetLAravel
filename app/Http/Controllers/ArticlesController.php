<?php

namespace App\Http\Controllers;

use App\Post; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{



    public function __construct()
    {
     
        $this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('manage',['only' => ['edit','update','destroy']]);
     

      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','DESC')->where('post_type','=','article')->paginate(6);
     
        $data = array(
            'articles'=>$posts
        );
        return view('pages.articles')->with($data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('articles.create'); 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $post =  Post::create([
        'user_id'=> $request->author,
        'post_content'=>$request->content,
        'post_title'=>$request->title,
        'post_status'=>'blabla',
        'post_type'=>'article',
        'post_category'=> 'DCISS',
        'post_name' => 'Monia',
        'image' => 'jdjdjd'
        ]);

       // $this->storeImage($post);

        return redirect('/articles')->with('status', 'Votre article a bien été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::where('id', $id)->first(); 
        return view('articles.show', array( 
            'post' => $post 
        ));
           
     
    }


    public function showUserArticles($id)
    {
        $articles = Post::all();
        $articles =$articles->where('user_id','=', $id);
        $data = array(
            'articles'=>$articles
        );
        return view('articles.showUserArticles')->with($data); 
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::where('id', $id)->first(); 
        return view('articles.edit', array(  
            'post' => $post 
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request,  $id)
    {
       //$post->post_title=$request->title;
       //$post->post_content=$request->content;
       //$post->save();
       $post =Post::where('id', $id)->first(); 
 
        $post->update([ 'post_content'=>$request->content,
         'post_title'=>$request->title,
         ]);
  
        return redirect()->back()->with('status', 'Votre modification a bien été enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            // Post::find($id)->delete(); 
            // return redirect()->back()->with('success', 'Votre articlen a bien été supprimé');

            return view('articles.destroy');
    }


    public function storeImage(Post $post) {

        if ( request('image')) {
            $post->update([
                'image' => request('image')->store('images', 'public')
            ]);
        }
    }
}
