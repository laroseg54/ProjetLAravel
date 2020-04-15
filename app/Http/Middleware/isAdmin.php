<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     * Vérifie si l utilisateur est un admin , dans le cas contraire refuse la requete
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() &&Auth::user()->role->role_name=="Admin"){
        return $next($request);}

      abort(403, 'Unauthorized action.');
    }
}
