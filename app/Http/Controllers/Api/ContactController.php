<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'message' => 'string'
        ]);

        $contact = new Contact();
        $contact->fill($dataValidate);
        $contact->save();

        return response()->json($contact);
    }
}
