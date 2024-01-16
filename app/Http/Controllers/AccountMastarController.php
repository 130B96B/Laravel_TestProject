<?php

namespace App\Http\Controllers;

use App\Models\Accunts;
use Illuminate\Http\Request;
use App\Http\Requests\AccountMastarRequest;

class AccountMastarController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('account_master.home');
    }

    public function registration()
    {
        return view('account_master.account.new_member_registration');
    }
    public function confirm(AccountMastarRequest $request)
    {
        $post = new Accunts();
        $post->fill($request->all())->save();

        return redirect('account_master/accounts_list');
    }
    public function accounts_list(Request $request)
    {
        $posts = Accunts::orderBy('created_at', 'asc')->where(function ($query) {

            if ($search = request('search')) {
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->get();

        return view('account_master.account.accounts_list',  compact('posts'));
    }

    public function destroy($id)
    {
        $post = Accunts::find($id);
        if (!$post) {
            return redirect()->route('accounts_list')->with('error', '投稿が見つかりません');
        }
        $post->destroy($id);

        return redirect()->route('accounts_list')->with('success', '投稿が削除されました');
    }
    public function edit($id)
    {
        $post = Accunts::find($id);

        return view('account_master.account.edit', ['post' => $post]);
    }
    public function update(AccountMastarRequest $request, $id)
    {
        $post = Accunts::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('accounts_list')->with('success', '投稿が更新されました');
    }
}
