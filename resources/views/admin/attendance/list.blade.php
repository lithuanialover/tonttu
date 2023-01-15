@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <h2>過去の登園降園一覧(園児のid順)</h2>
        <div class="table">
            <table>
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
                            <ul class="flex attendanceTd">
                                <p class="attendanceTime">{{  $attendanceStudent->punchOut }}</p>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <div id="pagination">
                {{ $attendanceStudents->links() }}
            </div>
        </div>

        <div class="flex lp-btn-position">
            <div class="register">
                <a href="{{ route('attendanceList') }}">もどる</a>
            </div>
            <div class="login">
                <a class="btn btn-primary" href="{{ route('csv') }}" target="_blank"> CSV出力</a>
            </div>
        </div>
    </div>
</div>
@endsection

