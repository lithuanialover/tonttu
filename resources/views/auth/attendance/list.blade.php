@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="clock">
            <div id="Date">
            </div>
            <ul class="flex">
                <li id="hours"></li>
                <li id="point">:</li>
                <li id="min"></li>
            </ul>
        </div>
        <div class="table">
            <table>
                <p>*本日の登園/降園一覧</p>
                <tr class="table-bloke">
                    <th>お子さま</th>
                    <th>登園</th>
                    <th>降園</th>
                </tr>
                @foreach( $attendanceStudents as  $attendanceStudent)
                <tr class="table-bloke">
                    <td style="width: 30%">
                        <ul class="flex" style="align-items: center;">
                            <li class="index-img"><img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student->student_image)}}"></li>
                            <li>{{  $attendanceStudent->student->student_kana }}</li>
                        </ul>
                    </td>
                    <td>
                        <p class="attendanceTime">{{  $attendanceStudent->punchIn }}</p>
                    </td>
                    <td>
                        <p class="attendanceTime">{{  $attendanceStudent->punchOut }}</p>
                    </td>
                </tr>
            @endforeach
                {{-- @foreach( $attendanceStudents as  $attendanceStudent)
                    @foreach( $attendanceStudent->attendances as $attendances)
                    <tr class="table-bloke">
                        <td style="width: 30%">
                            <ul class="flex" style="align-items: center;">
                                <li class="index-img"><img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student_image)}}"></li>
                                <li>{{  $attendanceStudent->student_kana }}</li>
                            </ul>
                        </td>
                        <td>
                            <div>
                                <ul class="flex">
                                    <li><p class="attendanceTime">{{  $attendances->punchIn }}</p></li>
                                    <li class="td-checkbox"><input type="checkbox" class="checkbox"></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div>
                                <ul class="flex">
                                    <li><p class="attendanceTime">{{  $attendances->punchOut }}</p></li>
                                    <li class="td-checkbox"><input type="checkbox"></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endforeach --}}
            </table>
        </div>
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('dashboard') }}">もどる</a>
            </div>
            {{-- <div class="login">
                <a href="{{ route('students.create') }}">履歴</a>
            </div> --}}
        </div>
    </div>
</div>
@endsection