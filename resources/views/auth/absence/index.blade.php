@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th class="table-student">お子さま</th>
                    <th class="table-qr">QRコード</th>
                    <th class="table-btn"></th>
                </tr>
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <a href="{{ route('students.create') }}">新規登録</a>
            </div>
        </div>
    </div>
</div>
@endsection
