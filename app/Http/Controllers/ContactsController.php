<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;
class ContactsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {

        $request->validate([
        'email' => ['required','email'],
        'company' => ['required','max:20'],
        'name' => ['required','max:20'],
        'tell' => ['required','regex:/^[0-9\-]+$/'],
        'birth_date' => 'required',
        'gender' => 'required',
        'occupation' => 'required',
        'contact_body' => 'required',
        ],[
            'name.required' =>  '氏名 は必須項目です。',
            'company.required' =>  '会社名 は必須項目です。',
            'tell.required' =>  '電話番号 は必須項目です。',
            'email.required' =>  'メールアドレス は必須項目です。',
            'birth_date.required' =>  '生年月日 は必須項目です。',
            'name.max' =>  '氏名は20文字より多く記入出来ません。',
            'company.max' =>  '会社名は20文字より多く記入出来ません。',
            'tell.regex' =>  'ハイフン付き半角数字のみ記入してください。',
            'email.email' =>  'メールアドレスを記入してください。',
            'gender.required' =>  '性別 は必須項目です。',
            'occupation.required' =>  '職業 は必須項目です。',
            'contact_body.required' =>  'お問い合わせ内容 は必須項目です。',
        ]);

        $inputs = $request->all();
        $type = [
            'male' => '男性',
            'female' => '女性',
            ];
            $type1 = [
                'employee' => '会社員',
                'self-employed' => '自営業',
            ];
            

            return view('contact.confirm', compact('inputs', 'type','type1'));
    }
    public function send(Request $request)
{

    $request->validate([
        'email' => ['required','email'],
        'company' => ['required','max:20'],
        'name' => ['required','max:20'],
        'tell' => ['required','regex:/^[0-9\-]+$/'],
        'birth_date' => 'required',
        'gender' => 'required',
        'occupation' => 'required',
        'contact_body' => 'required',
  ]);


    $action = $request->input('action');

    $inputs = $request->except('action');

    $type = [
        'male' => '男性',
        'female' => '女性',
        ];
    $type1=[
            'employee' => '会社員',
            'self-employed' => '自営業',
    ];

    if($action !== 'submit'){

        return redirect()
        ->route('contact.index')
        ->withInput($inputs);
        
    } else {

        \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs,$type,$type1));
        \Mail::to('kaitokitaguchi170@gmail.com')->send(new ContactsSendmail($inputs,$type,$type1));

        $request->session()->regenerateToken();

        return view('contact.thanks',  compact('inputs', 'type','type1'));

    }
}
}