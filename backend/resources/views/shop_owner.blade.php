
@extends('layouts.app')

@section('content')

<main>



<h1 class="card-header">オーナーショップ一覧</h1>
<div style="margin: 5ch">
    @if (is_null($allshop))
    <h2>管理しているショップがありません</h2>
    @else
    @foreach ($allshop as $shop)
    <a href="/product_all/{{$shop['id']}}" style="font-size: 2em; padding: 2px; margin-bottom: 10px; border: 1px solid #333333;">{{$shop['name']}}</a>
        <br><div>ショップ説明・・・{{$shop['description']}}</div><br>
    @endforeach

    @endif
    <a href="{{ url('/shop_reg') }}">ショップ登録</a>
</div>
</main>

@endsection

