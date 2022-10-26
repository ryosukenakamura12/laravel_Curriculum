@extends('layouts.app')
@section('content')

<h1 class="card-header">商品詳細</h1>
<a href="/shop_all"style="margin-left: 5ch">ショップ一覧へ</a>
<div style="margin: 5ch">


    <h2>{{$product['name']}}</h2>
    <div>説明・・・{{$product['description']}}</div>
    <div>値段・・・{{$product['price']}}円</div>
    <div>残り・・・
        @if ($product['stock']<='0')
        SOLD OUT<br><br>
        @else
        {{$product['stock']}}コ　
        <form action="/product_buy" method="post">
         @csrf
         <input type='hidden' name='id' value="{{ $product['id'] }}">
         <button type="submit">購入</button><br><br>
        </form>
        @endif

    @if ($owner=1)
    <a href="/product_alt/{{$product['id']}}">商品修正</a><br><br>
    <form action="/product_delete" method="post">
        @csrf
        <button type="submit">商品削除</button><br><br>
        <input type='hidden' name='id' value="{{ $id }}">
    </form>
    <a href="/product_csv/{{$product['id']}}">CSV出力</a>
    @endif

@endsection
