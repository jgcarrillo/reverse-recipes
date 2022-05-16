<?php

namespace App\Http\Controllers;

use App\Actions\Contact\CreateNewContact;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function store() {
        $newContact = new CreateNewContact();
        $contact = $newContact->create(Request::only(['name', 'email', 'subject', 'message']));

        return Redirect::route('message.success');
    }

}
