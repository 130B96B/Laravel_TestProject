@extends('layout.default')
@section('title', 'confirm')
@section('content')
<form method="POST" action="{{ route('contact.send') }}">
  @csrf
<div class="Form">
  <hr>
  <div class="Form-Item">
  <label >会社名:</label>
  {{ $inputs['company'] }}
  </div>
  <input name="company" value="{{ $inputs['company'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>氏名:</label>
  {{ $inputs['name'] }}
  </div>
  <input name="name" value="{{ $inputs['name'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>電話番号:</label>
  {{ $inputs['tell'] }}
  </div>
  <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>メールアドレス:</label>
  {{ $inputs['email'] }}
  </div>
  <input name="email" value="{{ $inputs['email'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>生年月日:</label>
  {{ $inputs['birth_date'] }}
  </div>
  <input name="birth_date" value="{{ $inputs['birth_date'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>性別:</label>
  {{ $type[$inputs['gender']]}} 
  </div>
  <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>職業:</label>
  {{ $type1[$inputs['occupation']]}} 
  </div>
  <input name="occupation" value="{{ $inputs['occupation'] }}" type="hidden">
  <hr>
  <div class="Form-Item">
  <label>お問い合わせ内容:</label>
  {!! nl2br(e($inputs['contact_body'])) !!}
  </div>
  <input name="contact_body" value="{{ $inputs['contact_body'] }}" type="hidden">

  <button type="submit" name="action" value="submit" class="btn">送信する</button>
  <button type="submit" name="action" value="back" class="btn">戻る</button>
</div>
</form>
@endsection 