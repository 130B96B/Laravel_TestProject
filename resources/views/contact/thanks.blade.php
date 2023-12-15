@extends('layout.default')
@section('title', 'thanks')
@section('content')
<form method="GET" action="{{ route('contact.index') }}">
  @csrf
  <div class="Form">
    <h1>送信完了しました</h1>
    <hr>
    <div class="Form-Item">
      <label>会社名:</label>
      {{ $inputs['company'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>氏名:</label>
      {{ $inputs['name'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>電話番号:</label>
      {{ $inputs['tel'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>メールアドレス:</label>
      {{ $inputs['email'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>生年月日:</label>
      {{ $inputs['birth_date'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>性別:</label>
      {{ $inputs['gender'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>職業:</label>
      {{ $inputs['occupation'] }}
    </div>
    <hr>
    <div class="Form-Item">
      <label>お問い合わせ内容:</label>
      {!! nl2br(e($inputs['contact_body'])) !!}
    </div>
    <button type="submit" name="action" value="top_page" class="btn1">トップページへ戻る</button>
</form>
