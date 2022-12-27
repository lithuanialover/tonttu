@extends('products.layout')
 
@section('content')
<h2 class="subtitle has-text-centered mt-4">編集</h2>
 
@if ($errors->any())
<div class="has-background-danger">
    <p>
        <span class="has-text-weight-bold">エラー！</span> 入力内容に問題がありました。
    </p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
 
<form class="column is-8 is-offset-2" action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h3 class="has-text-weight-bold">製品名:</h3>
    <input class="input" type="text" name="name" value="{{ $product->name }}" placeholder="製品名">
    <h3 class="has-text-weight-bold">詳細:</h3>
    <textarea class="input" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
    <div class="columns">
        <div class="column">
            <button type="submit" class="button is-success my-4">送信</button>
        </div>
        <div class="has-text-right column">
            <a class="button is-info my-4" href="{{ route('products.index') }}"> 戻る</a>
        </div>
    </div>
</form>
@endsection