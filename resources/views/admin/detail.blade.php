@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <h2>詳細</h2>
        <div class="flex">
            <div>
                <div class="detail-img">
                    @if (empty($student->student_image))
                        <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                    @else
                        <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}" style="margin: 10px 0">
                    @endif
                </div>

                <table class="table">
                    <tr>
                        <th>園児名</th>
                        <td>{{ $student->student_name }}</td>
                    </tr>
                    <tr>
                        <th>ふりがな</th>
                        <td>{{ $student->student_kana }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $student->student_gender }}</td>
                    </tr>
                    <tr>
                        <th>保護者</th>
                        <td>{{ $parent->user->name }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>登園</th>
                        <td>{{ $student->student_name }}</td>
                    </tr>
                    <tr>
                        <th>降園</th>
                        <td>{{ $student->student_kana }}</td>
                    </tr>
                    <tr>
                        <th>欠席</th>
                        <td>{{ $student->student_gender }}</td>
                    </tr>
                    <tr>
                        <th>遅刻</th>
                        <td>{{ $student->user_id }}</td>
                    </tr>
                                <tr>
                        <th>早退</th>
                        <td>{{ $student->student_gender }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="flex lp-btn-position" style="margin-bottom: 100px;">
            <div class="register">
                <a href="{{ route('attendanceList') }}">もどる</a>
            </div>
        </div>
    </div>
</div>
@endsection

