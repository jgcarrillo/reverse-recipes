<?php

namespace App\Http\Controllers;

use App\Actions\Contact\CreateNewContact;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function store() {
        $newContact = new CreateNewContact();
        $contact = $newContact->create(Request::only(['name', 'email', 'subject', 'message']));

        Session::put('message', Request::only('message'));

        return Redirect::route('message.success');
    }

    public function success()
    {
        if(!Session::has('message')){
            return Redirect::route('home');
        } else {
            Session::remove('message');
            return Inertia::render('ContactMessageView');
        }
    }

}
