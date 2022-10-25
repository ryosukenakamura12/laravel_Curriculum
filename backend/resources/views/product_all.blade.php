@extends('layouts.app')
@section('content')

<h1 class="card-header">商品一覧</h1>
<a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
<div style="margin: 5ch">

<a href="/shop_alt/{{$id}}">ショップ修正</a><br><br>


    @foreach ($products as $product)
    <h2>{{$product['name']}}</h2>
    <div>説明・・・{{$product['description']}}</div>
    <div>値段・・・{{$product['price']}}円</div>
    <div>残り・・・{{$product['stock']}}コ</div>
    <form action="/product_buy" method="post">
        @csrf
        <input type="number" name="buy">
        <input type='hidden' name='id' value="{{ $product['id'] }}">
        <button type="submit">購入</button>
    </form>
    <a href="/product_alt/{{$product['id']}}">商品修正</a><br><br>
    @endforeach

<a href="/product_reg/{{$id}}">商品追加</a><br><br>



@endsection
