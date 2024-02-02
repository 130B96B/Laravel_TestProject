@extends('layout.app')

@section('content')
<div>
    <form>
        <div class="search-groups">
            <div class="form-group">
                <label for="status1" class="search-group">ステータス</label>
                <select class="form-control mr-sm-2" id="status1" name="status1">
                    <option value="">選択してください</option>
                    @foreach(config('const.correspondence') as $key => $correspondence)
                        <option value="{{ $correspondence }}" {{ request('status1') == $correspondence ? 'selected' : '' }}>
                            {{ $correspondence }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="company1" class="search-group">会社名</label>
                <input type="search" class="form-control mr-sm-2" name="company1" value="{{ request('company1') }}"
                    placeholder="会社名を入力" id="company1">
            </div>
            <div class="form-group">
                <label for="name2" class="search-group">氏名</label>
                <input type="search" class="form-control mr-sm-2" name="name2" value="{{ request('name2') }}"
                    placeholder="氏名を入力" id="name2">
            </div>
        </div>
        <input type="submit" value="検索" class="search-btn">
    </form>
</div>
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
        <td>{{ $post->company }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ $post->tel}}</td>
    </tr>
    @endforeach
</table>
<div class="pagination"> {{ $posts->links() }} </div>

@endsection
