@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">お子様の新規登録</h2>
        @if($errors->any())
            <div class="alert-success">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li><p style="color: red;">{{ $error }}</p></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex auth-form">
            <form action="post" action="{{ route('user.students.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- 園児：名前 -->
                <div class="auth-input flex">
                    <label for="student_name" value="student_name">名前</label>
                    <input id="student_name"  class="input-css" type="text" name="student_name" value="{{ old('student_name') }}" required autofocus placeholder="名前">
                </div>
                <!-- 園児：フリガナ -->
                <div class="auth-input flex">
                    <label for="student_kana" value="student_kana">ふりがな(平仮名で入力)</label>
                    <input id="student_kana"  class="input-css" type="text" name="student_kana" value="{{ old('student_kana') }}" required autofocus placeholder="ふりがな">
                </div>
                <!-- 園児：性別 -->
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
                </div>
                {{-- <div class="flex table-btn-position">
                    <div class="register">
                        <a href="{{ route('user.students.index') }}">もどる</a>
                    </div>
                    <div class="login">
                        <a href="{{ route('user.students.store') }}">登録</a>
                    </div>
                </div> --}}
                <div class="tutrialの書き方">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
