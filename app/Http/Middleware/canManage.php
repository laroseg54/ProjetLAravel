<?php

namespace App\Http\Middleware;

use Closure;
use \App\Post;
use Illuminate\Support\Facades\Auth;

class canManage
{
    /**
     * Verifie si l'utilisateur authentifie est bien l'utilisateur qui a crée l'article , dans le cas contraire renvoie une erreur sauf si l'utilisateur a le role admin.
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
        
        
    }
}
