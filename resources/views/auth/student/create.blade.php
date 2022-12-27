@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">お子様の新規登録</h2>
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
            <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- 園児：名前 -->
                <div class="auth-input flex">
                    <label for="student_name" value="student_name">名前</label>
                    <input id="student_name"  class="input-css" type="text" name="student_name" required autofocus placeholder="名前">
                </div>
                <!-- 園児：フリガナ -->
                <div class="auth-input flex">
                    <label for="student_kana" value="student_kana">ふりがな(平仮名で入力)</label>
                    <input id="student_kana"  class="input-css" type="text" name="student_kana" required autofocus placeholder="ふりがな">
                </div>
                {{-- <!-- 園児：性別 -->
                <div class="auth-input flex">
                    <label for="student_gender" value="student_gender">性別</label>
                    <select name="student_gender" id="student_gender" class="input-css" value="{{ old('student_gender') }}" required>
                        <option value="Male">男の子</option>
                        <option value="Female">女の子</option>
                    </select>
                </div>
                <!-- 園児：写真 -->
                <div class="auth-input flex">
                    <label for="student_image" value="student_image">写真</label>
                    <input type="file" id="student_image" class="input-img" name="student_image" value="{{ old('student_image') }}" required autofocus>
                </div> --}}
                <div class="flex table-btn-position">
                    <div class="register">
                        <a href="{{ route('students.index') }}">もどる</a>
                    </div>
                    <button type="submit" class="login-btn">
                        登録
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
