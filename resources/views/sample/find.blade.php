@extends('adminlte::page')

@section('title','sample.find')

@section('menubar')
    @parent
    検索ページ
@endsection

@section('content')
<h1>商品検索</h1>
キーワード検索
<form action="/sample" method="post">
    @csrf 
    <input type="text" name="input">
    {{-- マルチプルの書き方 --}}        
    <select name="select" > 
            <option value="name">名前で</option>
            <option value="type">種別で</option>
            <option value="price">価格で</option>
            <option value="detail">詳細で</option>
    </select>
        <input type="submit" value=探す><br>
    </form>
    <br>
@if (isset($items))
<h6>検索結果<?php echo "(" . count($items) . "件)" ?><br></h6>
    <table border="2">
        <tr><th>名前</th><th>種別</th><th>販売日</th><th>価格</th><th width=50%>詳細</th></tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td><td>{{$item->type}}</td><td><a href="{{route('sell', ['sell_day'=>$item->sell])}}">{{$item->sell}}</td><td>{{$item->price}}</td><td>{{$item->detail}}</td>
            </tr>
        @endforeach
    </table> 
@endif


@endsection

