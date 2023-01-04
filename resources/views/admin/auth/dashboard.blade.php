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
    </div>
</div>
@endsection

