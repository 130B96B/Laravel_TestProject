<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class AccountMastarContactController extends Controller
{
    public function contacts()
    {
        $correspondence = config('const.correspondence');
        $posts = Contacts::simplepaginate(10);

        return view('account_master.contacts', ['posts' => $posts], compact('correspondence'));
    }

    public function contacts_edit($id)
    {
        $posts = Contacts::find($id);
        $type = config('const.type');
        $job = config('const.job');

        return view('account_master/contacts_edit', ['posts' => $posts], compact('type', 'job'));
    }

    public function contacts_update(Request $request, $id)
    {
        $post = Contacts::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('contacts')->with('success', '投稿が更新されました');
    }
}
