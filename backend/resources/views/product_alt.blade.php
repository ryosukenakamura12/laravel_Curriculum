
@extends('layouts.app')

@section('content')

<main>
    <h1 class="card-header">商品編集　入力フォーム</h1>
    <a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
    <div style="margin: 5ch">

    <form action="/product_update" method="post">
        @csrf

       <h3><br>商品名</h3>

       <textarea name="new_name" cols="40" rows="1" >{{$product['name']}} </textarea><br><br>

       <h3>説明</h3>
       <textarea name="new_description" cols="40" rows="3">{{$product['description']}} </textarea><br><br>

       <h3>値段</h3>
       <input  type="number" name="new_price" value="{{$product['price']}}">円<br><br>

       <h3>在庫</h3>
       <input  type="number" name="new_stock" value="{{$product['stock']}}">コ<br><br>

       <h4><br>登録者・・・{{$user['name']}}</h4><br>
       <input type='hidden' name='user_id' value="{{ $user['id'] }}">
       {{-- 商品のid --}}
       <input type='hidden' name='id' value="{{ $id }}">
     <button type="submit" name="button" style="margin-bottom: 5ch;"> 登録</button>
    </form>
    <form action="/product_delete" method="post">
        @csrf
        <button type="submit">商品削除</button><br><br>
        <input type='hidden' name='id' value="{{ $id }}">
    </form>
    </div>
</main>

@endsection
