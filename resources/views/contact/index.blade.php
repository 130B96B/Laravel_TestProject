@extends('layout.default')
@section('title', 'contact')
@section('content')
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf
<div class="Form">
<hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>会社名</p>
    <input name="company" value="{{ old('company') }}" type="text" placeholder="例）株式会社○○" class="Form-Item-Input">
</div>
    @if ($errors->has('company'))
        <p class="error-message">{{ $errors->first('company') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>氏名</p>
    <input name="name" value="{{ old('name') }}" type="text" placeholder="例）山田太郎"  class="Form-Item-Input">
</div>
    @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>電話番号</p>
    <input name="tell" value="{{ old('tell') }}" type="text" placeholder="例000-00000-0000"  class="Form-Item-Input">
</div>
    @if ($errors->has('tell'))
        <p class="error-message">{{ $errors->first('tell') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>メールアドレス</p>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="例）abc@abc.com" class="Form-Item-Input">
 </div>
    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>生年月日</p>
    <input name="birth_date" value="{{ old('birth_date') }}" type="date" class="Form-Item-Input-ex">
</div>
    @if ($errors->has('birth_date'))
        <p class="error-message">{{ $errors->first('birth_date') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>性別</p>
    <div class="Form-Item-Input-ex2">
    <label><input type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }} />男性</label>
    <label><input type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }} />女性</label>
    </div>
 </div>
    @if ($errors->has('gender'))
        <p class="error-message">{{ $errors->first('gender') }}</p>
    @endif
<hr>
<div class="Form-Item">
    <p class="Form-Item-Label"><span class="hissu">必須</span>職業</p>
    <select name="occupation" class="Form-Item-Input-ex">
      <option value="">-職業を選択してください-</option>
      <option value="employee" {{ old('occupation') === 'employee' ? 'selected' : ''}}>会社員</option>
      <option value="self-employed" {{ old('occupation') === 'self-employed' ? 'selected' : ''}}>自営業</option>
    </select>
</div>
    @if ($errors->has('occupation'))
        <p class="error-message">{{ $errors->first('occupation') }}</p>
    @endif
 <hr>
 <div class="Form-Item">
    <p class="Form-Item-Label Msg"><span class="hissu">必須</span>お問い合わせ内容</p>
    <textarea name="contact_body" class="Form-Item-Textarea">{{ old('contact_body') }}</textarea>
</div>
    @if ($errors->has('contact_body'))
        <p class="error-message" style="height:80px;">{{ $errors->first('contact_body') }}</p>
    @endif
 <button type="submit" class="btn">確認する</button>
</div>
</form>
@endsection 