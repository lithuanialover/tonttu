@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">早退連絡の編集</h2>
        @if($errors->any())
        <div class="alert-success">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li><p style="color: red;">{{ $error }}</p></li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="flex auth-form show-form">
            <form method="post" action="{{ route('leaveearlys.update', $leaveEarly->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- 園児：写真 --}}
                <!-- 園児：写真 -->
                <div class="auth-input flex" style="margin-bottom: 30px;">
                    @if (empty($student->student_image))
                    <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                    @else
                    <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}" style="margin: 10px 0">
                    @endif
                    {{-- <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}" style="margin: 10px 0"> --}}
                </div>
                <!-- 園児：名前 -->
                <div class="auth-input flex">
                    <label for="student_name" value="student_name">名前</label>
                    {{-- <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}" style="margin: 10px 0"> --}}
                    <p class="input-css show-input">{{ $student->student_name }}</p>
                    <input type="hidden" name="student_id" value="{{ $leaveEarly->student_id }}" >
                </div>
                <!-- 遅刻日 -->
                <div class="auth-input flex">
                    <label for="day" value="day">遅刻日</label>
                    <input id="day"  class="input-css" type="date" name="day" required value = "{{ $leaveEarly->day }}">
                </div>
                <!-- 到着時間 -->
                <div class="auth-input flex">
                    <label for="time" value="time">到着時間</label>
                    <input id="day"  class="input-css" type="time" name="time" required value = "{{ $leaveEarly->time }}">
                </div>
                <!-- 送迎者 -->
                <div class="auth-input flex">
                    <label for="parent" value="parent">送迎者</label>
                    <input id="parent-input"  class="input-css" type="text" name="parent" required value = "{{ $leaveEarly->parent }}">
                </div>
                <div class="flex table-btn-position" style="margin-bottom: 100px;">
                    <div class="register">
                        <a href="{{ route('leaveearlys.index') }}">もどる</a>
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
