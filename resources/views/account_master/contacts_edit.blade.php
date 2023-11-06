@extends('layout.app')
@section('content')
<form action="{{ route('contacts_update', ['id' => $posts->id]) }}" method="POST">
    @csrf
    @method('PUT')
<div class="contacts_edit">お問い合わせ編集</div>
<div class="contactsedit">

  <p><b>ステータス</b></p>
  <div class="contactsItem">
    <select name="status" class="Item-Input-ex">   
        <option value="Outstanding" {{ old('status', $posts->status) ===  'employee' ? 'selected' : ''}}>未対応</option>                   
        <option value="Processing" {{ old('status', $posts->status) === 'employee' ? 'selected' : ''}}>対応中</option>
        <option value="Closed" {{ old('status', $posts->status) === 'self-employed' ? 'selected' : ''}}>対応済</option>
    </select>
  </div>

  <p><b>お問い合わせ内容</b></p>
  <div class="contactsItem">
  {!! nl2br(e($posts['contact_body'])) !!}
  </div>
  <input name="contact_body" value="{{ $posts['contact_body'] }}" type="hidden">

  <p><b>備考</b></p>
  <div class="contactsItem">
    <textarea name="remarks" class="Item-Textarea" rows="5">{{ old('remarks', $posts->remarks) }}</textarea>
  </div>

  <p><b>お問い合わせ情報</b></p>
  <div class="contactsItem">
  <label >会社名:</label>
  {{ $posts['company'] }}
  </div>
  <input name="company" value="{{ $posts['company'] }}" type="hidden">

  <div class="contactsItem">
  <label>氏名:</label>
  {{ $posts['name'] }}
  </div>
  <input name="name" value="{{ $posts['name'] }}" type="hidden">
  
  <div class="contactsItem">
  <label>電話番号:</label>
  {{ $posts['tel'] }}
  </div>
  <input name="tel" value="{{ $posts['tel'] }}" type="hidden"> 

  <div class="contactsItem">
  <label>メールアドレス:</label>
  {{ $posts['email'] }}
  </div>
  <input name="email" value="{{ $posts['email'] }}" type="hidden">

  <div class="contactsItem">
  <label>生年月日:</label>
  {{ $posts['birth_date'] }}
  </div>
  <input name="birth_date" value="{{ $posts['birth_date'] }}" type="hidden">

  <div class="contactsItem">
  <label>性別:</label>
  {{ $type[$posts['gender']] }}
  </div>
  <input name="gender" value="{{ $posts['gender'] }}" type="hidden">

  <div class="contactsItem">
  <label>職業:</label>
  {{ $job[$posts['occupation']] }} 
  </div>
  <input name="occupation" value="{{ $posts['occupation'] }}" type="hidden">

  <button type="submit" class="btn2">登録する</button>
</div>
</form>
@endsection 