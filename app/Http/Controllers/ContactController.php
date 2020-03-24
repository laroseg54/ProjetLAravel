<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact() { 
        return view('pages.contact'); 
    }

    public function store(ContactRequest $request){
        return view('pages.contactConfirmation');
        //return Request::all();
    }
}
