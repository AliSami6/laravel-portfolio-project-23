<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store()
    {
        $contact_form_data = request()->all();
        Mail::to('alisamicse320@gmail.com')->send(new ContactFormMail($contact_form_data));
        return redirect()->route('home','/#contact')->with('success','Your message has been submitted successfully');
    }

   
}
