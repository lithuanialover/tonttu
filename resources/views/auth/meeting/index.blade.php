@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="cnt-mg-top auth-flame">
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
                        <tr class="table-bloke">
                            <td><p>{{ $meetingAttendance->meeting->name }}</p></td>
                            <td><p>{{ $meetingAttendance->meeting->eventDay }}</p></td>
                            <td><p>{{ $meetingAttendance->meeting->deadline }}</p></td>
                            <td>
                                <ul class="flex" style="justify-content: space-between;">
                                    <li>
                                        @switch($meetingAttendance->type_id)
                                            @case(99)
                                                <p class="status notyet">未回答</p>
                                                @break
                                            @case(1)
                                                <p class="status attend">出席</p>
                                                @break
                                            @case(2)
                                                <p class="status absent">欠席</p>
                                                @break
                                            @default
                                                エラー
                                        @endswitch
                                    </li>
                                    <li>
                                        <div class="details">
                                            <a href="{{ route('meetingAttendance.create',$meetingAttendance->id) }}">回答</a>
                                        </div>
                                    </li>
                                    {{-- 下記：あとでコメントアウトする --}}
                                    {{-- <li>
                                        <p>ログイン中id番号</p> 
                                        <p>{{ $meetingAttendance->user_id }}</p>
                                    </li> --}}
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
