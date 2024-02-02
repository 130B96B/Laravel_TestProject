<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class AccountMastarContactController extends Controller
{
    public function contacts(Request $request)
    {
        $posts = Contacts::where(function ($query) {

            if ($search = request('status1')) {
                $query->where('status',$search);
            }
            if ($search = request('company1')) {
                $query->where('company','LIKE',"%{$search}%");
            }
            if ($search = request('name2')) {
                $query->where('name','LIKE',"%{$search}%");
            }

        })->simplepaginate(5);

        return view('account_master.contact.contacts', compact('posts'));
    }

    public function contacts_edit($id)
    {
        $posts = Contacts::find($id);

        return view('account_master.contact.contacts_edit', compact('posts'));
    }

    public function contacts_update(Request $request, $id)
    {
        $post = Contacts::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('contacts')->with('success', '投稿が更新されました');
    }
}
