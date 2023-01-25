@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="flex camera-btn-position">
            <div class="attendance">
                <a href="{{ route('attendance') }}">登園</a>
            </div>
            <div class="leave">
                <a href="{{ route('leave') }}">降園</a>
            </div>
        </div>
        <div class="clock">
            <div id="Date">
            </div>
            <ul class="flex">
                <li id="hours"></li>
                <li id="point">:</li>
                <li id="min"></li>
            </ul>
        </div>
        <div class="flex lp-btn-position" style="margin-bottom: 100px;">
            <div class="register">
                <a href="{{ route('attendanceList') }}">登園・降園の状況</a>
            </div>
            <div class="login">
                <a href="{{ route('allStudents') }}">生徒一覧</a>
            </div>
            <div class="register">
                <a href="{{ route('meetingList') }}">イベント</a>
            </div>
        </div>
    </div>
</div>
@endsection

