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
        <div class="flex dashboard-position-btn">
            <div class="register">
                <a href="{{ route('attendanceCheck') }}">登園/降園状況</a>
            </div>
            <div class="login">
                <a href="{{ route('absences.index') }}">欠席連絡</a>
            </div>
        </div>
        <div class="flex dashboard-position-btn" style="margin-top: 30px;">
            <div class="register">
                <a href="{{ route('leaveearlys.index') }}">早退連絡　　</a>
            </div>
            <div class="login">
                <a href="{{ route('lates.index') }}">遅刻連絡</a>
            </div>
        </div>
        <div class="flex dashboard-position-btn" style="margin-top: 30px;">
            <div class="register">
                <a href="{{ route('students.index') }}">お子様の情報</a>
            </div>
            <div class="login">
                <a href="{{ route('meetingAttendance.index') }}">イベント</a>
            </div>
        </div>
    </div>
</div>
@endsection