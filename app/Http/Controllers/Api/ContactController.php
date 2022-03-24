<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\NewSiteContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        /* 
            Se si vuole inviare la mail a tutti gli admin:
            recuperiamo da db la lista degli admin e per ciascuno immagaziniamo la mail, per comporre 
            una lista di destinatari
        */

        Mail::to('nomemail@miosito.com')->send(new NewSiteContactMail($contact));

        return response()->json($contact);
    }
}
