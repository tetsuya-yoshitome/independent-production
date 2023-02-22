@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ようこそ</h1>

<br>
{{$unit}}
<br>


<main class="centering">
    <p id="log"></p>
  </main>
@stop

@section('content')

@endsection






@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

<script src="{{ asset('public\js\sample.js') }}" defer></script>