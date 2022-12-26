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
                @if(count($data) > 0)
                    @foreach($data as $row)
                    <tr class="table-bloke">
                        <td class="table-student">
                            <ul class="flex">
                                <li class="lists-img"><img src="{{ asset('images/'.'$row->student_image') }}" alt="img" with="50"></li>
                                <li>{{ $row-> student_kana }}</li>
                            </ul>
                        </td>
                        <td class="table-qr">
                        </td>
                        <td class="table-btn">
                            <div class="flex lists-btn-position">
                                <div class="details">
                                    <a href="{{ route('user.students.show', $row->id) }}">詳細</a>
                                </div>
                                <div class="edit">
                                    <a href="{{ route('user.students.edit', $row->id) }}">編集</a>
                                </div>
                                <form action="{{ route('user.students.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="削除">
                                </form>
                                {{-- <div class="delete">
                                    <a href="{{ route('user.students.destroy', $row->id) }}">編集</a>
                                </div> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr class="table-bloke">
                        <td>
                            <p>登録済の園児情報はありません。</p>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="paging">
            {{-- {{!! $data->links() !!}} --}}
            {{ $data->links() }}
        </div>
        <div class="flex table-btn-position">
            <div class="register">
                <a href="{{ route('dashboard') }}">もどる</a>
            </div>
            <div class="login">
                <a href="{{ route('user.students.create') }}">新規登録</a>
            </div>
        </div>
    </div>
</div>
@endsection
