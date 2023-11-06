@extends('layout.app')
@section('content')
<form method="POST" action="{{ route('accounts_list') }}">
  @csrf
<div class="Form">
  <div class="Form-Item">
  <label>氏名:</label>
  {{ $inputs['name'] }}
  </div>
  <input name="name" value="{{ $inputs['name'] }}" type="hidden">
  <div class="Form-Item">
  <label>フリガナ:</label>
  {{ $inputs['furigana'] }}
  </div>
  <input name="furigana" value="{{ $inputs['furigana'] }}" type="hidden">
  <div class="Form-Item">
  <label>メールアドレス:</label>
  {{ $inputs['email'] }}
  </div>
  <input name="email" value="{{ $inputs['email'] }}" type="hidden">
  <div class="Form-Item">
  <label>パスワード:</label>
  {{ $inputs['password'] }}
  </div>
  <input name="password" value="{{ $inputs['password'] }}" type="hidden">
  <div class="Form-Item">
  <label>電話番号:</label>
  {{ $inputs['tel'] }}
  </div>
  <input name="tel" value="{{ $inputs['tel'] }}" type="hidden">
  <div class="Form-Item">
  <label>郵便番号:</label>
  {{ $inputs['postalcode'] }}
  </div>
  <input name="postalcode" value="{{ $inputs['postalcode'] }}" type="hidden">
  <div class="Form-Item">
  <label>都道府県:</label>
  {{ $inputs['prefecture'] }}
  </div>
  <input name="prefecture" value="{{ $inputs['prefecture'] }}" type="hidden">
  <div class="Form-Item">
  <label>市区町村:</label>
  {{ $inputs['cities'] }}
  </div>
  <input name="cities" value="{{ $inputs['cities'] }}" type="hidden">
  <div class="Form-Item">
  <label>番地・アパート名:</label>
  {{ $inputs['address'] }}
  </div>
  <input name="address" value="{{ $inputs['address'] }}" type="hidden">
  <div class="Form-Item">
  <label>備考欄:</label>
  {!! nl2br(e($inputs['contact_body'])) !!}
  </div>
  <input name="contact_body" value="{{ $inputs['contact_body'] }}" type="hidden">

  <button type="submit" name="action" value="submit" class="btn">送信する</button>
  <button type="submit" name="action" value="back" class="btn">戻る</button>
</div>
</form>
@endsection 