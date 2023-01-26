@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <div class="flex" style="justify-content: space-between;">
            <div style="width: 75%;">
                <h2 class="form-ttl">イベントの詳細</h2>
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
            </div>
            <div style="width;20%;">
                <h2 class="form-ttl">投票の状況</h2>
                <div class="table">
                    <table style="width: 100%;">
                        <tr class="table-bloke">
                            <th>項目</th>
                            <th>数値</th>
                        </tr>
                        <tr class="table-bloke">
                            <td>会員数</td>
                            <td></td>
                        </tr>
                        <tr class="table-bloke">
                            <td>参加</td>
                            <td></td>
                        </tr>
                        <tr class="table-bloke">
                            <td>欠席</td>
                            <td></td>
                        </tr>
                        <tr class="table-bloke">
                            <td>未回答</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex table-btn-position" style="margin-bottom: 100px;">
            <div class="register show-btn">
                <a href="{{ route('meetingList') }}">もどる</a>
            </div>
        </div>
    </div>
</div>
@endsection
