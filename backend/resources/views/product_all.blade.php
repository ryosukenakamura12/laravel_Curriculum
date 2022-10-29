@extends('layouts.app')
@section('content')

<h1 class="card-header">商品一覧</h1>

<div style="margin: 5ch">
    @if ($owner==1)
        <a href="/shop_alt/{{$id}}">ショップ修正</a><br><br>
    @endif

        @foreach ($products as $product)
            <a href="/product_detail/{{$product['id']}}" style="font-size: 2em; padding: 2px; margin-bottom: 10px; border: 1px solid #333333;">{{$product['name']}}</a><br>
            <div>{{$product['description']}}</div><br>
        @endforeach

    @if ($owner==1)
        <a href="/product_reg/{{$id}}">商品追加</a><br><br>
        <form action="/shop_delete" method="post">
            @csrf
            <button type="submit">ショップ削除</button>
            <input type='hidden' name='id' value="{{ $id }}">
            </form>
    @endif


@endsection
