<?php

namespace App\Http\Middleware;

use Closure;
use \App\Post;
use Illuminate\Support\Facades\Auth;

class canManage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $article = Post::findOrFail($request->article);
        
        if (Auth::user() && (Auth::user()->role->role_name =='Admin' || Auth::user()->id==$article->user_id)){
        return $next($request);
        }

        abort(403, 'Unauthorized action.');
        //return redirect('/articles')->with('status', 'Acces interdit');;
        
    }
}
