<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Mail\ContactsSendmail;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {

        $inputs = $request->all();

        return view('contact.confirm', compact('inputs'));
    }

    public function send(ContactRequest $request)
    {

        $inputs = $request->except('action');

        $post = new contacts();
        $post->fill($request->all())->save();

        \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
        \Mail::to('kaitokitaguchi170@gmail.com')->send(new ContactsSendmail($inputs));

        $request->session()->regenerateToken();

        return view('contact.thanks',  compact('inputs'));

    }
}
