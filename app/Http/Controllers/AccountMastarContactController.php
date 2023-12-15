<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class AccountMastarContactController extends Controller
{
    public function contacts()
    {
        $posts = Contacts::simplepaginate(10);

        return view('account_master.contacts', ['posts' => $posts]);
    }

    public function contacts_edit($id)
    {
        $posts = Contacts::find($id);

        return view('account_master/contacts_edit', ['posts' => $posts]);
    }

    public function contacts_update(Request $request, $id)
    {
        $post = Contacts::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('contacts')->with('success', '投稿が更新されました');
    }
}
