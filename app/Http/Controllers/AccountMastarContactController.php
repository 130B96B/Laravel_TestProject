<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class AccountMastarContactController extends Controller
{
    public function contacts()
    {
        $correspondence = [
            'Outstanding' => '未対応',
            'Processing' => '対応中',
            'Closed' => '対応済',
        ];
        $posts = Contacts::simplepaginate(10);
        return view('account_master.contacts', ['posts' => $posts], compact('correspondence'));
    }

    public function contacts_edit($id)
    {
        $posts = Contacts::find($id);

        $type = [
            'male' => '男性',
            'female' => '女性',
        ];
        $job = [
            'employee' => '会社員',
            'self-employed' => '自営業',
        ];

        return view('account_master/contacts_edit', ['posts' => $posts], compact('type', 'job'));
    }

    public function contacts_update(Request $request, $id)
    {

        $post = Contacts::find($id);
        $post->remarks = $request->remarks;
        $post->status = $request->status;
        $post->save();

        return redirect()->route('contacts')->with('success', '投稿が更新されました');
    }
}
