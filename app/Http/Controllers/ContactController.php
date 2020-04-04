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
      
        $contact = new \App\Contact;
        $contact->contact_name = request('nom');
        $contact->contact_email = request('email');
        $contact->contact_message = request('message');
        $contact->contact_subject = request('subject');
        $contact->save();
        
        return view('pages.contactConfirmation');
    
        //return Request::all();
    }
}
