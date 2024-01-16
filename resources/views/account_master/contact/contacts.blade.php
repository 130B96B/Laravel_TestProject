@extends('layout.app')

@section('content')
<div class=A>
    <div class=accountlist>お問い合わせ一覧</div>
</div>

<table class="table" id="table">
    <tr>
        <th>編集</th>
        <th>ステータス</th>
        <th>会社名</th>
        <th>氏名</th>
        <th>電話番号</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td><a href="{{route('contacts_edit',['id' => $post->id]) }}"><button class="edit">編集</button></a></td>
        <td>{{ $post->status }}</td>
        <td>{{ $post->email }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ $post->tel}}</td>
    </tr>
    @endforeach
</table>
<div class="pagination"> {{ $posts->links() }} </div>

@endsection
