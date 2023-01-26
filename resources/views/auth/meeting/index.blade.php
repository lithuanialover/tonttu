@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="cnt-width cnt-mg-top auth-flame">
            <h2 class="form-ttl">イベント出欠連絡</h2>
            <div id="fadeInOut">
                @if($message = Session::get('complete'))
                <div class="alert-success">
                    {{ $message }}
                </div>
                @endif
                {{-- 失敗の時 --}}
                @if ($message = Session::get('error'))
                    <div class="alert-error">
                        {{ $message }}
                    </div>
                @endif
            </div>
            <div class="table">
                <table>
                    <tr class="table-bloke">
                        <th>イベント名</th>
                        <th>開催日</th>
                        <th>提出期日</th>
                        <th>提出状況</th>
                    </tr>
                        @foreach($meetingAttendances as $meetingAttendance)
                        <tr class="table-bloke" style="height: 100px">
                            <td><p>{{ $meetingAttendance->meeting->name }}</p></td>
                            <td><p>{{ $meetingAttendance->meeting->eventDay }}</p></td>
                            <td><p>{{ $meetingAttendance->meeting->deadline }}</p></td>
                            <td>
                                <ul class="flex">
                                    <li>
                                        @switch($meetingAttendance->type_id)
                                            @case(99)
                                                未回答
                                                @break
                                            @case(1)
                                                出席
                                                @break
                                            @case(2)
                                                欠席
                                                @break
                                            @default
                                                エラー
                                        @endswitch
                                    </li>
                                    <li>
                                        <button>回答</button>
                                    </li>
                                    <li>
                                        <p>ログイン中id番号</p> 
                                        <p>{{ $meetingAttendance->user_id }}</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div id="pagination">
                    {{ $meetingAttendances->links() }}
                </div>
            </div>
            <div class="flex table-btn-position" style="margin-top: 50px;">
                <div class="register">
                    <a href="{{ route('dashboard') }}">もどる</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
