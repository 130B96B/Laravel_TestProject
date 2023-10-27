<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;
use App\Models\contacts;

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
        'tel' => ['required','regex:/^[0-9\-]+$/'],
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
            'tel.regex' =>  'ハイフン付き半角数字のみ記入してください。',
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
        $job = [
                'employee' => '会社員',
                'self-employed' => '自営業',
            ];
            

            return view('contact.confirm', compact('inputs', 'type','job'));
    }

    public function send(Request $request)
{

    $request->validate([
        'email' => ['required','email'],
        'company' => ['required','max:20'],
        'name' => ['required','max:20'],
        'tel' => ['required','regex:/^[0-9\-]+$/'],
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
    $job=[
            'employee' => '会社員',
            'self-employed' => '自営業',
    ];

    $post = new contacts();
    $post->email = $request->email;
    $post->company = $request->company;
    $post->name = $request->name;
    $post->tel = $request->tel;
    $post->name = $request->name;
    $post->tel = $request->tel;
    $post->birth_date = $request->birth_date;
    $post->gender = $request->gender;
    $post->occupation = $request->occupation;
    $post->contact_body = $request->contact_body;
    $post->save();

    if($action !== 'submit'){

        return redirect()
        ->route('contact.index')
        ->withInput($inputs);
        
    } else {

        \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs,$type,$job));
        \Mail::to('kaitokitaguchi170@gmail.com')->send(new ContactsSendmail($inputs,$type,$job));

        $request->session()->regenerateToken();

        return view('contact.thanks',  compact('inputs', 'type','job'));

    }
}
}