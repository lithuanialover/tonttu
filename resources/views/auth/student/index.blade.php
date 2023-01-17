@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
    <div id="fadeInOut">
        @if($message = Session::get('success'))
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
                    <th class="table-qr">QRコード</th>
                    <th class="table-btn"></th>
                </tr>
                    @foreach($students as $student)
                    <tr class="table-bloke" style="height: 100px">
                        <td class="table-student">
                            <ul class="flex" style="align-items: center;">
                                <li class="index-img">
                                    @if (empty($student->student_image))
                                    <img class="rounded-circle" src="{{asset('/img/seeder/user.png')}}">
                                    @else
                                    <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}">
                                    @endif
                                </li>
                                <li>{{ $student->student_kana }}</li>
                            </ul>
                        </td>
                        <td class="table-qr">
                            <div class="flex lists-btn-position">
                                <div class="details">
                                    <a href="{{ route('generate',$student->id) }}" class="btn btn-primary">表示</a>
                                </div>
                                <div class="edit">
                                    <a href="{{ route('pdf',$student->id) }}" class="btn btn-primary">PDF</a>
                                </div>
                            </div>
                        </td>
                        <td class="table-btn">
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                <div class="flex lists-btn-position">
                                    <div class="details">
                                        <a href="{{ route('students.show',$student->id) }}">詳細</a>
                                    </div>
                                    <div class="edit">
                                        <a href="{{ route('students.edit',$student->id) }}">編集</a>
                                    </div>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        {{-- <div class="paging">
            {{ $data->links() }}
        </div> --}}
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <a href="{{ route('students.create') }}">新規登録</a>
            </div>
        </div>
    </div>
</div>
@endsection
