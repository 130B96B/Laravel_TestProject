@extends('layout.app')
@section('content')
<form action="{{ route('contacts_update', ['id' => $posts->id]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="contacts_edit">お問い合わせ編集</div>
  <div class="contactsedit">
    <p><b>ステータス</b></p>
    <div class="contactsItem"> <select name="status" class="Item-Input-ex">
        @foreach(config('const.correspondence') as $key => $correspondence)
        <option value="{{ $correspondence }}" {{ old('status', $posts->status) === $correspondence ? 'selected' : ''}}>{{ $correspondence }}</option>
        @endforeach
    </select>
    </div>
    <p><b>お問い合わせ内容</b></p>
    <div class="contactsItem">
       {!! nl2br(e($posts->contact_body)) !!}
    </div>
    <p><b>備考</b></p>
    <div class="contactsItem">
      <textarea name="remarks" class="Item-Textarea" rows="5">{{ old('remarks',$posts->remarks) }}</textarea>
    </div>
    <p><b>お問い合わせ情報</b></p>
    <div class="contactsItem">
      <label>会社名:</label> {{ $posts->company }}
    </div>
    <div class="contactsItem">
      <label>氏名:</label> {{ $posts->name }}
    </div>
    <div class="contactsItem">
      <label>電話番号:</label> {{ $posts->tel }}
    </div>
    <div class="contactsItem">
      <label>メールアドレス:</label> {{ $posts->email }}
    </div>
    <div class="contactsItem">
      <label>生年月日:</label> {{ $posts->birth_date }}
    </div>
    <div class="contactsItem">
      <label>性別:</label> {{ $posts->gender }}
    </div>
    <div class="contactsItem">
      <label>職業:</label> {{ $posts->occupation }}
    </div>
    <button type="submit" class="btn2">登録する</button>
  </div>
</form>
@endsection
