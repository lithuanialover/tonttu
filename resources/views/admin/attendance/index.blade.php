@extends('layouts.admin')

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
        <div class="flex attendanceAbsenceTable">
            <div id="attendanceTable" class="table">
                <table>
                    <p>*本日の登園/降園一覧</p>
                    <tr class="table-bloke">
                        <th>園児</th>
                        <th>登園</th>
                        <th>降園</th>
                    </tr>
                        @foreach( $attendanceStudents as  $attendanceStudent)
                        <tr class="table-bloke">
                            <td style="width: 30%">
                                <ul class="flex" style="align-items: center;">
                                    <li class="index-img"><img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student->student_image)}}"></li>
                                    {{-- <li>{{  $attendanceData->student_id }}</li> --}}
                                    <li>{{  $attendanceStudent->student->student_kana }}</li>
                                </ul>
                            </td>
                            <td style="width: 35%">
                                <p class="attendanceTime">{{  $attendanceStudent->punchIn }}</p>
                            </td>
                            <td style="width: 35%">
                                <p class="attendanceTime">{{  $attendanceStudent->punchOut }}</p>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $attendanceStudents->links() }}
                </div>
            </div>
            <div id="absenceTable" class="table">
                <table>
                    <p>*本日の欠席者</p>
                    <tr class="table-bloke">
                        <th>本日の欠席者</th>
                    </tr>
                        @foreach( $todaysAbsents as  $todaysAbsent)
                        <tr class="table-bloke" style="overflow: auto;">
                            <td style="width: 50%">
                                <ul class="flex" style="align-items: center; justify-content: space-between">
                                    <li class="index-img"><img class="rounded-circle" src="{{asset('storage/' . $todaysAbsent->student->student_image)}}"></li>
                                    {{-- <li>{{  $attendanceData->student_id }}</li> --}}
                                    <li>{{  $todaysAbsent->student->student_kana }}</li>
                                    <li>{{  $todaysAbsent->absentReason }}</li>
                                    {{-- <li>
                                        <button type="submit" class="details-btn">詳細</button>
                                    </li> --}}
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $attendanceStudents->links() }}
                </div>
            </div>
        </div>

        <div class="flex lp-btn-position">
            <div class="register">
                <a href="{{ route('admin.dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <a href="{{ route('attendanceHistory') }}">履歴</a>
            </div>
        </div>
    </div>
</div>
@endsection

