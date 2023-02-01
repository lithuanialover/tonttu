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
                        @if( !isset($student->student_name))
                        <td>名前なし</td>
                        @else
                        <td>{{ $student->student_name }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>ふりがな</th>
                        @if( !isset($student->student_kana))
                        <td>ふりがななし</td>
                        @else
                        <td>{{ $student->student_kana }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>性別</th>
                        @if( !isset($student->student_gender))
                        <td>性別なし</td>
                        @else
                        <td>{{ $student->student_gender }}</td>
                        @endif

                    </tr>
                    <tr>
                        <th>保護者</th>
                        @if( !isset($parent))
                        <td>親情報なし</td>
                        @else
                        <td>{{ $parent->user->name }}</td>
                        @endif
                    </tr>
                </table>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>登園</th>
                        @if( !isset($attendance->punchIn))
                        <td>情報なし</td>
                        @else
                        <td>{{ $attendance->punchIn }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>降園</th>
                        @if( !isset($attendance->punchOut))
                        <td>情報なし</td>
                        @else
                        <td>{{ $attendance->punchOut }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>欠席</th>
                        @if( !isset($absent->absentDay))
                        <td>情報なし</td>
                        @else
                        <td>
                            <ul>
                                <li>欠席日: {{ $absent->absentDay }}</li>
                                <li>欠席理由: {{ $absent->absentReason }}</li>
                            </ul>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <th>遅刻</th>
                        @if( !isset($late->day))
                        <td>情報なし</td>
                        @else
                        <td>
                            <ul>
                                <li>遅刻日: {{ $late->day }}</li>
                                <li>到着予定時間: {{ $late->time }}</li>
                                <li>送迎者: {{ $late->parent }}</li>
                            </ul>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <th>早退</th>
                        @if( !isset($leaveEarly->day))
                        <td>情報なし</td>
                        @else
                        <td>
                            <ul>
                                <li>早退日: {{ $leaveEarly->day }}</li>
                                <li>降園予定時間: {{ $leaveEarly->time }}</li>
                                <li>送迎者: {{ $leaveEarly->parent }}</li>
                            </ul>
                        </td>
                        @endif
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

