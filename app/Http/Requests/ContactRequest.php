<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'company' => ['required', 'max:20'],
            'name' => ['required', 'max:20'],
            'tel' => ['required', 'regex:/^[0-9\-]+$/'],
            'birth_date' => 'required',
            'gender' => 'required',
            'occupation' => 'required',
            'contact_body' => 'required',
        ];
    }

    public function messages()
    {
        return [
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
        ];
    }
}
