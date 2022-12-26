@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">編集</h2>
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
            <form action="post" action="{{ route('user.students.update, $student->id') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- 園児：名前 -->
                <div class="auth-input flex">
                    <label for="student_name" value="student_name">名前</label>
                    <input id="student_name"  class="input-css" type="text" name="student_name" value="{{ $student->student_name }}" required autofocus placeholder="名前">
                </div>
                <!-- 園児：フリガナ -->
                <div class="auth-input flex">
                    <label for="student_kana" value="student_kana">ふりがな(平仮名で入力)</label>
                    <input id="student_kana"  class="input-css" type="text" name="student_kana" value="{{ $student->student_kana }}" required autofocus placeholder="ふりがな">
                </div>
                <!-- 園児：性別 -->
                <div class="auth-input flex">
                    <label for="student_gender" value="student_gender">性別</label>
                    <select name="student_gender" id="student_gender" class="input-css" value="{{ $student->student_gender }}" required>
                        <option value="Male">男の子</option>
                        <option value="Female">女の子</option>
                    </select>
                </div>
                <!-- 園児：写真 -->
                <div class="auth-input flex">
                    <label for="student_image" value="student_image">写真</label>
                    <input type="file" id="student_image" class="input-img" name="student_image">
                    <img src="{{ asset('images/' . $student->student_image) }}" alt="画像" with="100">
                    <input type="hideen" name="hidden_student_image" value="{{ $student->student_image }}" required autofocus>
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
                    <input type="hidden" name="hidden_id" value="{{ $student->id }}">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    dcument.getElementsByName('student_gender')[0].value = "{{ $student -> student_gender }}"
</script>
@endsection
