@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <h2>過去の登園降園一覧(日付順)</h2>
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
                            <ul class="flex attendanceTd">
                                <li><p class="attendanceTime">{{  $attendanceStudent->punchIn }}</p></li>
                                {{-- <li>{{  $attendanceData->student_id }}</li> --}}
                                <li>
                                    <p class="checkbox-p">確認</p>
                                    <input type="checkbox">
                                </li>
                            </ul>
                        </td>
                        <td style="width: 35%">
                            <ul class="flex attendanceTd">
                                <li><p class="attendanceTime">{{  $attendanceStudent->punchOut }}</p></li>
                                <li>
                                    <p class="checkbox-p">確認</p>
                                    <input type="checkbox">
                                </li>
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
                <a href="{{ route('admin.dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <button>CSV出力</button>
            </div>
        </div>
    </div>
</div>
@endsection

