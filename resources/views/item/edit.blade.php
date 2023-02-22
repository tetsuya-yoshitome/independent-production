@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form action="{{ url('items/edit/'.$item_edit[0]->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($item_edit as $val)
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$val->name)}}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <input type="number" class="form-control" id="type" name="type" value="{{old('type',$val->type)}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{old('price',$val->price)}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{old('detail',$val->detail)}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">販売日</label>
                            <input type="date" class="form-control" id="sell" name="sell" value="{{old('detail',$val->sell)}}">
                        </div>
                    </div>
                    @endforeach
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="button1">修正</button>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="button2">削除</button>
                    </div> 
                </form>
            </div>
            <div>
                <button><a href="{{ url('items') }}">戻る</a></button>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
