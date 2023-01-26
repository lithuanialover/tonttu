@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <h2 class="form-ttl">イベント出欠登録</h2>
        <h3 class="form-sub-ttl">{{ $meeting->name }}</h3>
        @if($errors->any())
        <div class="alert-success">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li><p style="color: red;">{{ $error }}</p></li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="flex auth-form show-form">
                <div class="table">
                    <table style="width: 100%;">
                        <tr class="table-bloke">
                            <th>項目</th>
                            <th>内容</th>
                        </tr>
                        <tr class="table-bloke">
                            <td>イベント名</td>
                            <td>{{ $meeting->name }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>開催日</td>
                            <td>{{ $meeting->eventDay }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>開催時間</td>
                            <td>{{ $meeting->startTime }}～{{ $meeting->endTime }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>イベント詳細</td>
                            <td>{{ $meeting->description }}</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p>参加しますか？</p> 
                    <div class="flex lists-btn-position">
                        {{-- はい 「1」出席--}}
                        <div>
                        <form method="post" action="{{ route('meetingAttendance.attend', ['id'=>$meetingAttendance->id]) }}" enctype="multipart/form-data">
                        @csrf
                            <!-- user_id -->
                            <input type="hidden" name="user_id" value="{{ $meetingAttendance->user_id }}">
                            <!-- meeting_id -->
                            <input type="hidden" name="meeting_id" value="{{ $meeting->id }}">
                            <!-- type_id -->
                            <input type="hidden" name="type_id" value="1">

                            <button type="submit" class="details-btn">はい</button>
                        </form>
                        </div>
                        {{-- いいえ 「2」欠席--}}
                        <div>
                        <form method="post" action="{{ route('meetingAttendance.absent', ['id'=>$meetingAttendance->id]) }}" enctype="multipart/form-data">
                        @csrf
                            <!-- user_id -->
                            <input type="hidden" name="user_id" value="{{ $meetingAttendance->user_id }}">
                            <!-- meeting_id -->
                            <input type="hidden" name="meeting_id" value="{{ $meeting->id }}">
                            <!-- type_id -->
                            <input type="hidden" name="type_id" value="2">

                            <button type="submit" class="delete-btn">いいえ</button>
                        </form>
                        </div>
                    </div>
                </div>              
        </div>
    </div>
</div>
@endsection
