@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">欠席連絡の詳細</h2>
        <div class="flex auth-form show-form">
                <!-- 園児：写真 -->
                <div class="auth-input flex" style="margin-bottom: 30px;">
                    <label for="student_image" value="student_image">写真</label>
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
                <!-- 欠席日 -->
                <div class="auth-input flex">
                    <label for="absentDay" value="absentDay">欠席日</label>
                    <p class="input-css show-input">{{ $absence->absentDay }}</p>
                </div>
                <!-- 欠席理由 -->
                <div class="auth-input flex">
                    <label for="absentReason" value="absentReason">欠席理由</label>
                    <p class="input-css show-input">{{ $absence->absentReason }}</p>
                </div>
                <div class="flex table-btn-position">
                    <div class="register show-btn">
                        <a href="{{ route('absences.index') }}">もどる</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection