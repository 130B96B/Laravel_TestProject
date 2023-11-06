@extends('layout.app')

@section('content')
<div class="HOME" id="HOME" >HOME</div>

<div class="box" id="box">
<div class="space">
    <label class="Member_registration">アカウント登録</label>
    <ul class="members">
          <li class="member"><a href="{{ route('accounts_list') }}">アカウント一覧</a></li>
    </ul>
</div>
</div>
@endsection
