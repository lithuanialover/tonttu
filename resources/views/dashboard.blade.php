@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="clock">
            <div id="Date">
            </div>
            <ul class="flex">
                <li id="hours"></li>
                <li id="point">:</li>
                <li id="min"></li>
            </ul>
        </div>
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th>お子さま</th>
                    <th>登園</th>
                    <th>降園</th>
                </tr>
                <tr class="table-bloke">
                    <td>
                        <p>name</p>
                    </td>
                    <td>
                        <div>
                            <ul class="flex">
                                <li class="td-status">status</li>
                                <li class="td-time">time</li>
                                <li class="td-checkbox"><input type="checkbox" class="checkbox"></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <div>
                            <ul class="flex">
                                <li class="td-status">status</li>
                                <li class="td-time">time</li>
                                <li class="td-checkbox"><input type="checkbox"></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-attention-txt">
            <p class="attention-color">＊先生がお子さまの登園・降園を確認したときに、チェックボックスを付けます。</p>
        </div>
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('students.index') }}">お子様の情報</a>
            </div>
            <div class="login">
                <a href="{{ route('students.create') }}">新規登録</a>
            </div>
        </div>
    </div>
</div>
@endsection
