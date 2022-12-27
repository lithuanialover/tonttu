@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">詳細</h2>
        <div class="flex auth-form show-form">
                <!-- 園児：名前 -->
                <div class="auth-input flex">
                    <label for="student_name" value="student_name">名前</label>
                    <p class="input-css show-input">{{ $student->student_name }}</p>
                </div>
                <!-- 園児：フリガナ -->
                <div class="auth-input flex">
                    <label for="student_kana" value="student_kana">ふりがな(平仮名で入力)</label>
                    <p class="input-css show-input">{{ $student->student_kana }}</p>
                </div>
                <!-- 園児：性別 -->
                <div class="auth-input flex">
                    <label for="student_gender" value="student_gender">性別</label>
                    <p class="input-css show-input">{{ $student->student_gender }}</p>
                </div>
                {{-- <!-- 園児：写真 -->
                <div class="auth-input flex">
                    <label for="student_image" value="student_image">写真</label>
                    <input type="file" id="student_image" class="input-img" name="student_image" value="{{ old('student_image') }}" required autofocus>
                </div> --}}
                <div class="flex table-btn-position">
                    <div class="register">
                        <a href="{{ route('students.index') }}">もどる</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
