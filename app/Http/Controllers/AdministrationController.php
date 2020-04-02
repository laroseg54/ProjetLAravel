<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
    public function administration() { 
        return view('pages.administration'); 
    }

}
