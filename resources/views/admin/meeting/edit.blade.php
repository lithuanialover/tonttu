@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="cnt-mg-top auth-flame">
            <h2 class="form-ttl">出欠案内編集</h2>
            @if ($errors->any())
            <article class="message is-danger">
                <div class="message-header">
                    <p>エラー！！
                        入力内容に問題がありました。</p>
                </div>
                <div class="message-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><p style="color: red;">{{ $error }}</p></li>
                        @endforeach
                    </ul>
                </div>
            </article>
            @endif
            <div class="flex auth-form">
                <form method="post" action="{{ route('meeting.update', ['id'=>$meeting->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <!-- イベント名 -->
                    <div class="auth-input flex">
                        <label for="student_name" value="name">イベント名</label>
                        <input id="name"  class="input-css" type="text" name="name" required autofocus placeholder="音楽発表会" value="{{ $meeting->name }}">
                    </div>
                    <!-- イベント詳細 -->
                    <div class="auth-input flex">
                        <label for="description" value="description">イベント詳細</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="input-css textarea-css" required autofocus
                            placeholder="毎日練習したお歌を発表します。">{{ $meeting->description }}</textarea>
                    </div>
                    <!-- 開催日 -->
                    <div class="auth-input flex">
                        <label for="eventDay" value="eventDay">イベント開催日</label>
                        <input id="eventDay" class="input-css" type="date" name="eventDay" required
                            value="{{ $meeting->eventDay }}">
                    </div>
                    <div class="flex" style="justify-content: space-between;">
                        <!-- 開始時間 -->
                        <div class="auth-input flex" style="width:45%;">
                            <label for="startTime" value="startTime">開始時間</label>
                            <input id="startTime" class="input-css" type="time" name="startTime" required
                                value="{{ $meeting->startTime }}">
                        </div>
                        <!-- 終了時間 -->
                        <div class="auth-input flex" style="width:45%;">
                            <label for="endTime" value="endTime">終了時間</label>
                            <input id="endTime" class="input-css" type="time" name="endTime" required
                                value="{{ $meeting->endTime }}">
                        </div>
                    </div>
                    <!-- 提出期日 -->
                    <div class="auth-input flex">
                        <label for="deadline" value="deadline">提出期日</label>
                        <input id="deadline" class="input-css" type="date" name="deadline" required
                            value="{{ $meeting->deadline }}">
                    </div>
                    <div class="flex table-btn-position" style="margin-top: 15px;">
                        <div class="register">
                            <a href="{{ route('meetingList') }}">もどる</a>
                        </div>
                        <button type="submit" class="login-btn">
                            更新
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection