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
            <form method="post" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
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
                        <option value="男の子">男の子</option>
                        <option value="女の子">女の子</option>
                    </select>
                </div>
                <!-- 園児：写真 -->
                <div class="auth-input flex">
                    <label for="student_image" value="student_image">写真</label>
                        @if (empty($student->student_image))
                        <img src="{{asset('/img/seeder/user.png')}}">
                        @else
                        <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}">
                        @endif
                    {{-- <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}"> --}}
                    <input type="file" id="student_image" class="input-img" name="student_image">
                </div>
                <!-- 外部キー user_id -->
                <input type="hidden" value="{{ auth()->id() }}" name="user_id">

                <div class="flex table-btn-position" style="margin-bottom: 100px;">
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
<script>
    // dcument.getElementsByName('student_gender')[0].value = "{{ $student -> student_gender }}"
</script>
@endsection
