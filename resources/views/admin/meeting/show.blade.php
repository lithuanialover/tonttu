@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">イベントの詳細</h2>
        <div class="flex auth-form show-form">
                <!-- イベント名 -->
                <div class="auth-input flex">
                    <label for="student_name" value="name">イベント名</label>
                    <p class="input-css show-input">{{ $meeting->name }}</p>
                </div>
                <!-- イベント詳細 -->
                <div class="auth-input flex">
                    <label for="description" value="description">イベント詳細</label>
                    <p class="input-css show-input">{{ $meeting->description }}</p>
                </div>
                <!-- 開催日 -->
                <div class="auth-input flex">
                    <label for="eventDay" value="eventDay">イベント開催日</label>
                    <p class="input-css show-input">{{ $meeting->eventDay }}</p>
                </div>
                <div class="flex" style="justify-content: space-between;">
                    <!-- 開始時間 -->
                    <div class="auth-input flex"style="width:45%;">
                        <label for="startTime" value="startTime">開始時間</label>
                        <p class="input-css show-input">{{ $meeting->startTime}}</p>
                    </div>
                    <!-- 終了時間 -->
                    <div class="auth-input flex" style="width:45%;">
                        <label for="endTime" value="endTime">終了時間</label>
                        <p class="input-css show-input">{{ $meeting->endTime }}</p>
                    </div>
                </div>
                <!-- 提出期日 -->
                <div class="auth-input flex">
                    <label for="eventDay" value="eventDay">提出期日</label>
                    <p class="input-css show-input">{{ $meeting->deadline }}</p>
                </div>
                <div class="flex table-btn-position" style="margin-bottom: 100px;">
                    <div class="register show-btn">
                        <a href="{{ route('meetingList') }}">もどる</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
