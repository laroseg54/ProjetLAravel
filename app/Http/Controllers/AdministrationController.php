<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('isAdmin');
}
    public function administration() { 
        return view('layouts.administration'); 
    }

}
