@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width">
        <div class="auth-flame">
            <h2 class="form-ttl">欠席連絡</h2>
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
                <form method="post" action="{{ route('absences.store') }}" enctype="multipart/form-data">
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
                        <label for="absentDay" value="absentDay">欠席日</label>
                        <input id="absentDay"  class="input-css" type="date" name="absentDay" required value = "{{ old('absentDay') }}">
                    </div>
                    <!-- 欠席理由 -->
                    <div class="auth-input flex">
                        <label for="absentReason" value="absentReason">欠席理由</label>
                        <textarea name="absentReason" id="absentReason" cols="30" rows="10" class="input-css textarea-css" required autofocus placeholder="体調不良のため">{{ old('absentReason') }}</textarea>
                    </div>

                    <div class="flex table-btn-position" style="margin-top: 15px;">
                        <div class="register">
                            <a href="{{ route('absences.index') }}">もどる</a>
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
