<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class CreateNewContact
{
    /**
     * Validate and create a newly contact.
     *
     * @param  array  $input
     * @return \App\Models\Contact
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ])->validate();

        return Contact::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);
    }
}
