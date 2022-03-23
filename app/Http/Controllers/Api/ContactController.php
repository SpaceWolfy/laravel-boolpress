<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'message' => 'string',
            'uploadedFile' => 'nullable'
        ]);

        $contact = new Contact();
        $contact->fill($dataValidate);

        if (key_exists('uploadedFile', $dataValidate)) {
            $contact->uploadedFile = Storage::put('contactAttachments', $dataValidate['uploadedFile']);
        }

        $contact->save();

        return response()->json($contact);
    }
}
