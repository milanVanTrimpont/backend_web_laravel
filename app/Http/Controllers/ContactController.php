<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Models\ContactForm;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function sendMail(Request $request)
    {

        $validated = $request->validate
        ([
            'email' => 'required|email|max:255',
            'onderwerp' => 'required|string|max:255',
            'vraag' => 'required|string',
        ]);
        //opslaan in db
        $contactForm = ContactForm::create($validated);

        Mail::to('fake@mail.com')->send(new Contact($contactForm));

        return redirect()->route('contact.form')->with('status', 'Je bericht is verzonden!');
    }

    public function showForm()
    {
        return view('contact.form');
    }

}
