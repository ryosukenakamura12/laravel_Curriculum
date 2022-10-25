
@extends('layouts.app')

@section('content')
<main>
    <h1 class="card-header">ショップ登録　入力フォーム</h1>
    <a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
    <div style="margin: 5ch">

        <form action="/shops" method="post">
            @csrf

           <h3><br>ショップ名</h3>
           <textarea name="name" cols="40" rows="1" placeholder="ここに記入"></textarea><br><br>

           <h3>説明</h3>
           <textarea name="description" cols="40" rows="3" placeholder="ここに記入"></textarea><br>

           <h4><br>登録者・・・{{$user['name']}}</h4><br>
           <input type='hidden' name='user_id' value="{{ $user['id'] }}">
        <button type="submit" name="button" > 登録 </button>
    </form>
  </div>
</main>



@endsection

