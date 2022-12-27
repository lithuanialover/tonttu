@extends('layouts.app')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
    @if($message = Session::get('success'))
        <div class="alert-success">
            {{ $message }}
        </div>
    @endif
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th class="table-student">お子さま</th>
                    <th class="table-qr">QRコード印刷</th>
                    <th class="table-btn"></th>
                </tr>
                    @foreach($students as $student)
                    <tr class="table-bloke">
                        <td class="table-student">
                            <ul class="flex" style="align-items: center;">
                                <li class="lists-img"><img src="{{ asset('images/'.'1672111672.jpg') }}" alt="img" with="50"></li>
                                {{-- <li class="lists-img"><img src="{{ asset('images/'.$student->student_image) }}" alt="img" with="50"></li> --}}
                                <li>{{ $student->student_kana }}</li>
                            </ul>
                        </td>
                        <td class="table-qr">
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
        <div class="paging">
            {{-- {{ $data->links() }} --}}
        </div>
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
