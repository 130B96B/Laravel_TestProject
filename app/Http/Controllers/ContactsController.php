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
        $type = config('const.type');
        $job = config('const.job');

        return view('contact.confirm', compact('inputs', 'type', 'job'));
    }

    public function send(ContactRequest $request)
    {

        $inputs = $request->except('action');
        $type = config('const.type');
        $job = config('const.job');

        $post = new contacts();
        $post->fill($request->all())->save();

        \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs, $type, $job));
        \Mail::to('kaitokitaguchi170@gmail.com')->send(new ContactsSendmail($inputs, $type, $job));

        $request->session()->regenerateToken();

        return view('contact.thanks',  compact('inputs', 'type', 'job'));

    }
}
