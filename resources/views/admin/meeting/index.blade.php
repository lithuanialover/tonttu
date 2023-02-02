@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width">
        <div class="cnt-mg-top auth-flame">
            <h2 class="form-ttl">イベント出欠確認</h2>
            <div id="fadeInOut">
                @if($message = Session::get('complete'))
                <div class="alert-success">
                    {{ $message }}
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert-error">
                    {{ $message }}
                </div>
                @endif
            </div>
            <div id="search" style="margin-bottom: 20px;">
                <form method="GET" action="{{ route('meetingList') }}" class="search_container">
                    <input type="text" placeholder="イベント名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                    <a href="{{ route('meetingList') }}" class="text-white">✖</a>
                    <input type="submit" value="&#xf002">
                    
                </form>
            </div>
            <div class="table">
                <table>
                    <tr class="table-bloke">
                        <th>イベント名</th>
                        <th>開催日</th>
                        <th></th>
                    </tr>
                    @foreach($eventHistories as $eventHistory)
                    <tr class="table-bloke" style="height: 100px">
                        <td>
                            <p>{{ $eventHistory->name }}</p>

                        </td>
                        <td>
                            <p>{{ $eventHistory->eventDay }}</p>
                        </td>
                        <td>
                            <form action="{{ route('meeting.destroy', ['id'=>$eventHistory->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex lists-btn-position">
                                    <div class="edit">
                                        <a href="{{ route('pdf',$eventHistory->id) }}" class="btn btn-primary">PDF</a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('meeting.show',$eventHistory->id) }}">詳細</a>
                                    </div>
                                    <div class="edit">
                                        <a href="{{ route('meeting.edit',$eventHistory->id) }}">編集</a>
                                    </div>
                                    <button type="submit" class="delete-btn">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div id="pagination">
                    {{ $eventHistories->links() }}
                    {{-- {{ $institutions->appends(request()->input())->links() }} --}}
                </div>
            </div>
            <div class="flex lp-btn-position" style="margin-bottom: 100px;">
                <div class="register">
                    <a href="{{ route('admin.dashboard') }}">もどる</a>
                </div>
                <div class="login">
                    <a href="{{ route('meetingForm') }}">新規作成</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection