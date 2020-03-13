<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact() {
        
        //$title= "This is the contact page"; 
        return view('pages.contact'); 
    }


    public function store(ContactRequest $request)
    {
    return view('confirm');
    }
}
