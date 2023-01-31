@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">早退連絡の詳細</h2>
        <div class="flex auth-form show-form">
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
                    <p class="input-css show-input">{{ $student->student_name }}</p>
                </div>
                <!-- 遅刻日 -->
                <div class="auth-input flex">
                    <label for="absentDay" value="absentDay">早退日</label>
                    <p class="input-css show-input">{{ $leaveEarly->day }}</p>
                </div>
                <!-- 到着時間 -->
                <div class="auth-input flex">
                    <label for="absentDay" value="absentDay">降園時間</label>
                    <p class="input-css show-input">{{ $leaveEarly->time }}</p>
                </div>
                <!-- 送迎者 -->
                <div class="auth-input flex">
                    <label for="absentDay" value="absentDay">送迎者</label>
                    <p class="input-css show-input">{{ $leaveEarly->parent }}</p>
                </div>
                <div class="flex table-btn-position" style="margin-bottom: 100px;">
                    <div class="register show-btn">
                        <a href="{{ route('leaveearlys.index') }}">もどる</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection