@extends('products.layout')
 
@section('content')
<h2 class="subtitle has-text-centered mt-4">Laravel 9 CRUD</h2>
 
@if ($message = Session::get('success'))
<article class="message is-success">
    <div class="message-header">
        <p>Success</p>
    </div>
    <div class="message-body">
        <p>{{ $message }}</p>
    </div>
</article>
@endif
<div class="column is-8 is-offset-2">
    <a class="button is-primary my-4 is-fullwidth" href="{{ route('products.create') }}"> 新規作成</a>
    <table class="table is-bordered is-striped has-text-centered is-fullwidth">
        <tr>
            <th>ID</th>
            <th>製品名</th>
            {{-- <th>Details</th> --}}
            <th>操作</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            {{-- <td>{{ $product->detail }}</td> --}}
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="button is-info" href="{{ route('products.show',$product->id) }}">詳細を表示</a>
                    <a class="button is-success" href="{{ route('products.edit',$product->id) }}">編集</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button is-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
 
@endsection