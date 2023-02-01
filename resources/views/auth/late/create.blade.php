@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="auth-flame">
            <h2 class="form-ttl">遅刻連絡</h2>
            @if ($errors->any())
                <article class="message is-danger">
                    <div class="message-header">
                        <p>エラー！！
                            入力内容に問題がありました。</p>
                    </div>
                    <div class="message-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endif
            <div class="flex auth-form">
                <form method="post" action="{{ route('lates.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- 園児：名前 -->
                    <div class="auth-input flex">
                        <label for="student_id" value="student_id">お子様の名前</label>
                        <select name="student_id" id="student_id" class="input-css">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" @if(old('student_id') == $student->id) selected @endif>{{ $student->student_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- 欠席日 -->
                    <div class="auth-input flex">
                        <label for="day" value="day">遅刻日</label>
                        <input id="day"  class="input-css" type="date" name="day" required value = "{{ old('day') }}">
                    </div>
                    <!-- 到着時間 -->
                    <div class="auth-input flex" style="width:45%;">
                        <label for="time" value="time">予定登園時間</label>
                        <input id="time" class="input-css" type="time" name="time" required
                                value="{{ old('time') }}">
                    </div>
                    <!-- 送迎者名 -->
                    <div class="auth-input flex">
                        <label for="parent" value="parent">送迎者名</label>
                        <input id="parentInput"  class="input-css" type="text" name="parent" required autofocus placeholder="保護者" value="{{ old('parent') }}">
                    </div>
                    <div class="flex table-btn-position" style="margin-top: 15px;">
                        <div class="register">
                            <a href="{{ route('lates.index') }}">もどる</a>
                        </div>
                        <button type="submit" class="login-btn">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
