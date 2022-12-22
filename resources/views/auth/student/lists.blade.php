@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th class="table-student">お子さま</th>
                    <th class="table-qr">QRコード印刷</th>
                    <th class="table-btn"></th>
                </tr>
                <tr class="table-bloke">
                    <td class="table-student">
                        <ul class="flex">
                            <li class="lists-img"><img src="{{ asset('') }}" alt="img"></li>
                            <li>nameさん</li>
                        </ul>
                    </td>
                    <td class="table-qr">
                    </td>
                    <td class="table-btn">
                        <div class="flex lists-btn-position">
                            <div class="edit">
                                <a href="{{ route('register') }}">編集</a>
                            </div>
                            <div class="delete">
                                <a href="{{ route('login') }}">削除</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex table-btn-position">
            <div class="login">
                <a href="{{ route('dashboard') }}">もどる</a>
            </div>
        </div>
    </div>
</div>
@endsection
