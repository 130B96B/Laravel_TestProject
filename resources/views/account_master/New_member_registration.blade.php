@extends('layout.app')
@section('content')
<form method="POST" action="{{ route('confirm') }}">
    @csrf
<div class="Form">
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>会員名</p>
    <input name="name" value="{{ old('name') }}" type="text" placeholder="例）山田太郎"  class="Form-Item-Input">
</div>
    @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>フリガナ</p>
    <input name="furigana" value="{{ old('furigana') }}" type="text" placeholder="例）ヤマダタロウ"  class="Form-Item-Input">
</div>
    @if ($errors->has('furigana'))
        <p class="error-message">{{ $errors->first('furigana') }}</p>
    @endif
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>メールアドレス</p>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="例）abc@abc.com" class="Form-Item-Input">
</div>
    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>パスワード</p>
    <input name="password" value="{{ old('password') }}" type="password" placeholder="例）password" class="Form-Item-Input">
</div>
    @if ($errors->has('password'))
        <p class="error-message">{{ $errors->first('password') }}</p>
    @endif
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>電話番号</p>
    <input name="tel" value="{{ old('tel') }}" type="text" placeholder="例000-00000-0000"  class="Form-Item-Input">
</div>
    @if ($errors->has('tel'))
        <p class="error-message">{{ $errors->first('tel') }}</p>
    @endif
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>郵便番号</p>
    <input name="postalcode" value="{{ old('postalcode') }}" type="text" placeholder="例000-00000-0000"  class="Form-Item-Input">
</div>
    @if ($errors->has('postalcode'))
        <p class="error-message">{{ $errors->first('postalcode') }}</p>
    @endif
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>都道府県</p>
    <select name="prefecture" class="Form-Item-Input-ex">  
    <option value="">未選択</option>                     
    @foreach(config('pref') as $key => $score)
        <option value="{{ $score }}" {{ old('prefecture') === $score ? 'selected' : ''}}>{{ $score }}</option>
    @endforeach
</select>
</div>
    @if ($errors->has('prefecture'))
        <p class="error-message">{{ $errors->first('prefecture') }}</p>
    @endif
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>市区町村</p>
    <input name="cities" value="{{ old('cities') }}" type="text"  class="Form-Item-Input">
</div>
    @if ($errors->has('cities'))
        <p class="error-message">{{ $errors->first('cities') }}</p>
    @endif
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>番地・アパート名</p>
    <input name="address" value="{{ old('address') }}" type="text"  class="Form-Item-Input">
</div>
    @if ($errors->has('address'))
        <p class="error-message">{{ $errors->first('address') }}</p>
    @endif
 <div class="Form-Item">
    <p class="Form-Item-Label Msg">備考欄</p>
    <textarea name="contact_body" class="Form-Item-Textarea" rows="5">{{ old('contact_body') }}</textarea>
</div>
    @if ($errors->has('contact_body'))
        <p class="error-message" style="height:80px;">{{ $errors->first('contact_body') }}</p>
    @endif
 <button type="submit" class="btn">登録する</button>
</div>
</form>
@endsection 