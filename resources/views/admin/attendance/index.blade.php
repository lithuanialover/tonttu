@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <div class="clock">
            <div id="Date">
            </div>
            <ul class="flex">
                <li id="hours"></li>
                <li id="point">:</li>
                <li id="min"></li>
            </ul>
        </div>
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th>お子さま</th>
                    <th>登園</th>
                    <th>降園</th>
                </tr>
                    @foreach($attendanceStudents as $attendanceStudent)
                    <tr class="table-bloke" style="height: 100px">
                        <td class="table-student">
                            <ul class="flex" style="align-items: center;">
                                {{-- <li class="index-img"><img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}"></li> --}}
                                <li>{{ $attendanceStudent->student_name }}</li>
                            </ul>
                        </td>
                        <td class="table-btn">
                            {{-- <form action="{{ route('students.destroy',$student->id) }}" method="POST">
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
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <div class="register">
            <a href="{{ route('admin.dashboard') }}">もどる</a>
        </div>
    </div>
</div>
@endsection

