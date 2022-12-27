@extends('products.layout')
 
@section('content')
<h2 class="subtitle has-text-centered mt-4"> 詳細</h2>
 
<div class="media-content column is-8 is-offset-2">
    <h3 class="has-text-weight-bold">製品名:</h3>
    <div class="box">
        <p>{{ $product->name }}</p>
    </div>
    <h3 class="has-text-weight-bold">詳細:</h3>
    <div class="box">
        {{ $product->detail }}
    </div>
    <div class="has-text-right">
        <a class="button is-info my-4 has-right" href="{{ route('products.index') }}"> 戻る</a>
    </div>
</div>
@endsection