@extends('layouts.app')

@section('content')
<main>
    <h1 class="card-header">商品登録　入力フォーム</h1>
    <a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
    <div style="margin: 5ch">

        <form action="/products" method="post">
            @csrf

           <h3><br>商品名</h3>
           <textarea name="name" cols="40" rows="1" placeholder="ここに記入"></textarea><br><br>

           <h3><br>説明</h3>
           <textarea name="description" cols="40" rows="3" placeholder="ここに記入"></textarea><br>

           <h3><br>値段</h3>
           <textarea name="price" cols="40" rows="1" placeholder="ここに記入"></textarea><br><br>

           <h3><br>在庫</h3>
           <textarea name="stock" cols="40" rows="1" placeholder="ここに記入"></textarea><br><br>

           <h4><br>ショップ・・・{{$shop['name']}}</h4><br>
           <input type='hidden' name='shop_id' value="{{ $shop['id'] }}">
        <button type="submit" name="button" > 登録 </button>
    </form>
  </div>
    <!-- 入力フォームここまで -->
</main>



@endsection
