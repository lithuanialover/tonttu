@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="flex attendanceAbsenceTable">
            <div class="clock attendanceTable">
                <div id="Date">
                </div>
                <ul class="flex">
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                </ul>
            </div>
            <div class="calculation absenceTable">
                <table class="table">
                    <tr>
                        <th>総生徒数</th>
                        <td>{{ $countStudents }} <span style="font-size: 14px;">人</span></td>
                        <th>未登園数</th>
                        <td><span class="red-p">{{ $countNonAttendances }}</span> <span style="font-size: 14px;">人</span></td>
                    </tr>
                    <tr>
                        <th>登園数</th>
                        <td>{{ $countAttendances }} <span style="font-size: 14px;">人</span></td>
                        <th>欠席数</th>
                        <td>{{ $countAbsences }} <span style="font-size: 14px;">人</span></td>
                    </tr>
                    <tr>
                        <th>早退数</th>
                        <td>{{ $countLeaveEarly }} <span style="font-size: 14px;">人</span></td>
                        <th>遅刻数</th>
                        <td>{{ $countLateness }} <span style="font-size: 14px;">人</span></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="flex attendanceAbsenceTable">
            <div class="attendanceTable table">
                <table>
                    <tr class="table-bloke">
                        <th>園児</th>
                        <th>登園</th>
                        <th>降園</th>
                    </tr>
                        @foreach( $attendanceStudents as  $attendanceStudent)
                        <tr class="table-bloke">
                            <td style="width: 40%">
                                <ul class="flex" style="align-items: center;">
                                    <li class="index-img">
                                        {{-- <img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student->student_image)}}"> --}}
                                        @if (empty($attendanceStudent->student->student_image))
                                        <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                        @else
                                        {{-- <a href="{{ route('showAllInfo', $attendanceStudent->student->id) }}">
                                            <img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student->student_image)}}" style="margin: 10px 0">
                                        </a> --}}
                                        <a href="{{ route('showAllInfo', $attendanceStudent->student->id) }}" class="image_box hover_t_1">
                                            <figure class="img_wrap">
                                                <img class="rounded-circle" src="{{asset('storage/' . $attendanceStudent->student->student_image)}}" alt="生徒画像">
                                                <figcaption class="txt_wrap">
                                                <div class="txt_box">
                                                    <p>Click</p>
                                                </div>
                                                </figcaption>
                                            </figure>
                                        </a>
                                        @endif
                                    </li>
                                    {{-- <li>{{  $attendanceData->student_id }}</li> --}}
                                    <li>{{  $attendanceStudent->student->student_kana }}</li>
                                </ul>
                            </td>
                            <td style="width: 30%">
                                <p class="attendanceTime">{{  $attendanceStudent->punchIn }}</p>
                            </td>
                            <td style="width: 30%">
                                <p class="attendanceTime">{{  $attendanceStudent->punchOut }}</p>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $attendanceStudents->links() }}
                </div>
            </div>
            <div class="absenceTable table">
                {{-- 欠席 --}}
                <table>
                    <tr class="table-bloke">
                        <th>本日の欠席者</th>
                    </tr>
                        @foreach( $todaysAbsents as  $todaysAbsent)
                        <tr class="table-bloke" style="overflow: auto;">
                            <td style="width: 50%">
                                <ul class="flex" style="align-items: center; justify-content: space-between">
                                    <li class="index-img">
                                        @if (empty($todaysAbsent->student->student_image))
                                        <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                        @else
                                        <a href="{{ route('showAllInfo', $todaysAbsent->student->id) }}" class="image_box hover_t_1">
                                            <figure class="img_wrap">
                                                <img class="rounded-circle" src="{{asset('storage/' . $todaysAbsent->student->student_image)}}" alt="生徒画像">
                                                <figcaption class="txt_wrap">
                                                <div class="txt_box">
                                                    <p>Click</p>
                                                </div>
                                                </figcaption>
                                            </figure>
                                        </a>
                                        @endif
                                    </li>
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
                    {{ $todaysAbsents->links() }}
                </div>
                {{-- 遅刻 --}}
                <table>
                    <tr class="table-bloke">
                        <th>本日の遅刻者</th>
                    </tr>
                        @foreach( $todaysLateness as  $todaysLate)
                        <tr class="table-bloke" style="overflow: auto;">
                            <td style="width: 50%">
                                    <ul class="flex" style="align-items: center; justify-content: space-between">
                                        <li class="index-img">
                                            @if (empty($todaysLate->student->student_image))
                                            <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                            @else
                                            <a href="{{ route('showAllInfo', $todaysLate->student->id) }}" class="image_box hover_t_1">
                                                <figure class="img_wrap">
                                                    <img class="rounded-circle" src="{{asset('storage/' . $todaysLate->student->student_image)}}" alt="生徒画像">
                                                    <figcaption class="txt_wrap">
                                                    <div class="txt_box">
                                                        <p>Click</p>
                                                    </div>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                            @endif
                                        </li>

                                        <li>{{  $todaysLate->student->student_kana }}</li>
                                        <li>登園時間 {{  $todaysLate->time }}</li>
                                        {{-- <li>
                                            <button type="submit" class="details-btn">詳細</button>
                                        </li> --}}
                                    </ul>
                                {{-- </a> --}}
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $todaysLateness->links() }}
                </div>
                {{-- 早退 --}}
                <table>
                    <tr class="table-bloke">
                        <th>本日の早退者</th>
                    </tr>
                        @foreach( $todaysLeaveEarlies as  $todaysLeaveEarly)
                        <tr class="table-bloke" style="overflow: auto;">
                            <td style="width: 50%">
                                <ul class="flex" style="align-items: center; justify-content: space-between">
                                    <li class="index-img">
                                        @if (empty($todaysLeaveEarly->student->student_image))
                                            <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                        @else
                                            <a href="{{ route('showAllInfo', $todaysLeaveEarly->student->id) }}" class="image_box hover_t_1">
                                                <figure class="img_wrap">
                                                    <img class="rounded-circle" src="{{asset('storage/' . $todaysLeaveEarly->student->student_image)}}" alt="生徒画像">
                                                    <figcaption class="txt_wrap">
                                                    <div class="txt_box">
                                                        <p>Click</p>
                                                    </div>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        @endif
                                    </li>
                                    {{-- <li>{{  $attendanceData->student_id }}</li> --}}
                                    <li>{{  $todaysLeaveEarly->student->student_kana }}</li>
                                    <li>早退時間{{  $todaysLeaveEarly->time }}</li>
                                    {{-- <li>
                                        <button type="submit" class="details-btn">詳細</button>
                                    </li> --}}
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $todaysLeaveEarlies->links() }}
                </div>
            </div>
        </div>

        <div class="flex lp-btn-position" style="margin-bottom: 100px;">
            <div class="register">
                <a href="{{ route('admin.dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <a href="{{ route('attendanceHistory') }}">登降園 履歴</a>
            </div>
            <div class="register">
                <a href="{{ route('allStudents') }}">生徒一覧</a>
            </div>
        </div>
    </div>
</div>
@endsection

