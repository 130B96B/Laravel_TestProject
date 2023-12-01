<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountMastarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'furigana' => ['required', 'max:30'],
            'name' => ['required', 'max:30'],
            'tel' => ['required', 'regex:/^[0-9\-]+$/'],
            'password' =>  ['required', 'min:8'],
            'postalcode' => ['required', 'regex:/^[0-9\-]+$/'],
            'prefecture' => 'required',
            'cities' => ['required', 'max:30'],
            'address' => ['required', 'max:50'],
            'contact_body' => ['max:255', 'nullable',],
        ];
    }
    public function messages()
    {
        return [
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
        ];
    }

}
