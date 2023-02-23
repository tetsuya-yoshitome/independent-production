@extends('adminlte::page')

@section('title','sample.find')

@section('menubar')
    @parent
@endsection

@section('content')


@if (isset($results))

<h3>@foreach($results as $result)
    @endforeach{{$result->sell}}に売れたのは<?php echo "" . count($results) . "件" ?><br></h3>
    <table border="2">
        <tr><th>売れた日</th>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>価格</th>
            <th width=400px>詳細</th>
        </tr>
        @foreach($results as $result)
            <tr>
                <td>{{$result->sell}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->type}}</td>
                <td>{{$result->price}}</td>
                <td>{{$result->detail}}</td>
            </tr>
        @endforeach    
    </table>
        
    <br>
@endif



    <table border="3">
    @foreach ($items as $item)    
        <tr>
            <td>売上合計</td><td>{{ $item->max_price }}</td>
        </tr>
    @endforeach
    </table>

@endsection

