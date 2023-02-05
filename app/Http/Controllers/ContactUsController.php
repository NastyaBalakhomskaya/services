<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(CreateContactRequest $request)
    {
        $mail = new NewContact(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone'),
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', trans('messages.contact.success'));

        return redirect()
            ->back();
    }
}
