<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accunts;

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
        return view('account_master.New_member_registration');
    }
    public function confirm(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'unique:accuntmaster'],
            'furigana' => ['required', 'max:30'],
            'name' => ['required', 'max:30'],
            'tel' => ['required', 'regex:/^[0-9\-]+$/'],
            'password' =>  ['required', 'min:8'],
            'postalcode' => ['required', 'regex:/^[0-9\-]+$/'],
            'prefecture' => 'required',
            'cities' => ['required', 'max:30'],
            'address' => ['required', 'max:50'],
            'contact_body' => ['max:255', 'nullable',]
        ], [
            'name.required' =>  '会員名 は必須項目です。',
            'furigana.required' =>  'フリガナ は必須項目です。',
            'tel.required' =>  '電話番号 は必須項目です。',
            'email.required' =>  'メールアドレス は必須項目です。',
            'password.required' =>  'パスワード は必須項目です。',
            'postalcode.required' =>  '郵便番号 は必須項目です。',
            'prefecture.required' =>  '都道府県 は必須項目です。',
            'cities.required' =>  '市区町村 は必須項目です。',
            'address.required' =>  '番号・アパート名 は必須項目です。',
            'name.max' =>  '会員名は30文字より多く記入出来ません。',
            'furigana.max' =>  'フリガナは30文字より多く記入出来ません。',
            'password.min' =>  'パスワードは8文字以上にしてください。',
            'cities.max' =>  '市区町村は30文字より多く記入出来ません。',
            'address.max' =>  '番号・アパート名は50文字より多く記入出来ません。',
            'contact_body.max' =>  '備考欄は255文字より多く記入出来ません。',
            'tel.regex' =>  'ハイフン付き半角数字のみ記入してください。',
            'postalcode.regex' =>  'ハイフン付き半角数字のみ記入してください。',
            'email.email' =>  'メールアドレスを記入してください。',
            'email.unique' => 'このメールアドレスは既に登録されています。',
        ]);

        $post = new Accunts();
        $post->email = $request->email;
        $post->furigana = $request->furigana;
        $post->name = $request->name;
        $post->tel = $request->tel;
        $post->password = $request->password;
        $post->postalcode = $request->postalcode;
        $post->prefecture = $request->prefecture;
        $post->cities = $request->cities;
        $post->address = $request->address;
        $post->contact_body = $request->contact_body;
        $post->save();

        return redirect('account_master/accounts_list');
    }
    public function accounts_list()
    {
        $posts = Accunts::all();
        return view('account_master.accounts_list', ['posts' => $posts]);
    }
    public function destroy($id)
    {
        $post = Accunts::find($id);
        if (!$post) {
            return redirect()->route('accounts_list')->with('error', '投稿が見つかりません');
        }

        $post->delete();

        return redirect()->route('accounts_list')->with('success', '投稿が削除されました');
    }
    public function edit($id)
    {
        $post = Accunts::find($id);
        return view('account_master.edit', ['post' => $post]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'furigana' => ['required', 'max:30'],
            'name' => ['required', 'max:30'],
            'tel' => ['required', 'regex:/^[0-9\-]+$/'],
            'password' =>   ['required', 'min:8'],
            'postalcode' => ['required', 'regex:/^[0-9\-]+$/'],
            'prefecture' => 'required',
            'cities' => ['required', 'max:30'],
            'address' => ['required', 'max:50'],
            'contact_body' => 'max:255',
        ], [
            'name.required' =>  '会員名 は必須項目です。',
            'furigana.required' =>  'フリガナ は必須項目です。',
            'tel.required' =>  '電話番号 は必須項目です。',
            'email.required' =>  'メールアドレス は必須項目です。',
            'password.required' =>  'パスワード は必須項目です。',
            'postalcode.required' =>  '郵便番号 は必須項目です。',
            'prefecture.required' =>  '都道府県 は必須項目です。',
            'cities.required' =>  '市区町村 は必須項目です。',
            'address.required' =>  '番号・アパート名 は必須項目です。',
            'name.max' =>  '会員名は30文字より多く記入出来ません。',
            'furigana.max' =>  'フリガナは30文字より多く記入出来ません。',
            'password.min' =>  'パスワードは8文字以上にしてください。',
            'cities.max' =>  '市区町村は30文字より多く記入出来ません。',
            'address.max' =>  '番号・アパート名は50文字より多く記入出来ません。',
            'contact_body.max' =>  '備考欄は255文字より多く記入出来ません。',
            'tel.regex' =>  'ハイフン付き半角数字のみ記入してください。',
            'postalcode.regex' =>  'ハイフン付き半角数字のみ記入してください。',
            'email.email' =>  'メールアドレスを記入してください。',
        ]);

        $post = Accunts::find($id);
        $post->email = $request->input('email');
        $post->furigana = $request->input('furigana');
        $post->name = $request->input('name');
        $post->tel = $request->input('tel');
        $post->password = $request->input('password');
        $post->postalcode = $request->input('postalcode');
        $post->prefecture = $request->input('prefecture');
        $post->cities = $request->input('cities');
        $post->address = $request->input('address');
        $post->contact_body = $request->input('contact_body');
        $post->save();

        return redirect()->route('accounts_list')->with('success', '投稿が更新されました');
    }
}
