<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('isAdmin');
}
    public function administration() { 
        return view('pages.administration'); 
    }

    public function administration_users() { 
        $users = User::paginate(12);
        return view('administration.utilisateurs',compact(['users'])); 
    }

}
