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
        <div class="flex table-btn-position">
            <div class="register" style="margin-bottom: 30px">
                <a href="{{ route('attendanceCheck') }}">登園・降園の確認</a>
            </div>
            <div class="login" style="margin-bottom: 30px">
                <a href="{{ route('attendanceCheck') }}">当日の欠席連絡</a>
            </div>
        </div>
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('students.index') }}">お子様の情報</a>
            </div>
            <div class="login">
                <a href="{{ route('students.create') }}">お子様の新規登録</a>
            </div>
        </div>
    </div>
</div>
@endsection