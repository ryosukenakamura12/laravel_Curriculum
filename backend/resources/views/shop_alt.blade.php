
@extends('layouts.app')

@section('content')
<main>
    <h1 class="card-header">ショップ編集　入力フォーム</h1>
    <a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
    <div style="margin: 5ch">

     <form action="/shop_update" method="post">
        @csrf

       <h3><br>ショップ名</h3>

       <textarea name="new_name" cols="40" rows="1"> {{$shop['name']}}</textarea><br><br>

       <h3>説明</h3>
       <textarea name="new_description" cols="40" rows="3">{{$shop['description']}}</textarea><br>

       <h4><br>登録者・・・{{$user['name']}}</h4><br>
       <input type='hidden' name='user_id' value="{{ $user['id'] }}">
       <input type='hidden' name='id' value="{{ $id }}">
    <button type="submit" name="button" style="margin-bottom: 5ch;"> 登録</button>
    </form>

    <form action="/shop_delete" method="post">
    @csrf
    <button type="submit">ショップ削除</button>
    <input type='hidden' name='id' value="{{ $id }}">
    </form>

    </div>
</main>



@endsection
