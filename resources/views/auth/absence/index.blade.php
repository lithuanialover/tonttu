@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="cnt-mg-top auth-flame">
            <h2 class="form-ttl">欠席履歴</h2>
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
                        <th class="table-student">お子さま</th>
                        <th class="table-qr">欠席日</th>
                        <th class="table-btn"></th>
                    </tr>
                        @foreach($absenceHistories as $absenceHistory)
                        <tr class="table-bloke" style="height: 100px">
                            <td class="table-student">
                                <ul class="flex" style="align-items: center;">
                                    <li class="index-img">
                                        {{-- <img class="rounded-circle" src="{{asset('storage/' . $absenceHistory->student->student_image)}}"> --}}
                                        @if (empty($absenceHistory->student->student_image))
                                        <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                        @else
                                        <img class="rounded-circle" src="{{asset('storage/' . $absenceHistory->student->student_image)}}">
                                        @endif
                                    </li>
                                    <li>{{ $absenceHistory->student->student_kana }}</li>
                                </ul>
                            </td>
                            <td class="table-qr">
                                <p>{{ $absenceHistory->absentDay }}</p>
                            </td>
                            <td class="table-btn">
                                <form action="{{ route('absences.destroy',$absenceHistory->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex lists-btn-position">
                                        <div class="details">
                                            <a href="{{ route('absences.show',$absenceHistory->id) }}">詳細</a>
                                        </div>
                                        <div class="edit">
                                            <a href="{{ route('absences.edit',$absenceHistory->id) }}">編集</a>
                                        </div>
                                        <button type="submit" class="delete-btn">削除</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <div id="pagination">
                    {{ $absenceHistories->links() }}
                </div>
            </div>
            <div class="flex table-btn-position" style="margin-top: 50px;">
                <div class="register">
                    <a href="{{ route('dashboard') }}">もどる</a>
                </div>
                <div class="login">
                    <a href="{{ route('absences.create') }}">新規欠席連絡</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
