@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top">
        <h2>園児の一覧</h2>
        <div class="table">
            <table>
                <tr class="table-bloke">
                    <th>園児</th>
                    <th>保護者</th>
                </tr>
                    @foreach( $students as  $student)
                    <tr class="table-bloke">
                        <td>
                            <ul class="flex " style="align-items: center;">
                                <li class="index-img" style="padding-right: 20px;"><img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}"></li>
                                <li style="padding-right: 20px;">{{  $student->student_name }} /</li>
                                <li style="padding-right: 20px;">{{  $student->student_kana }} /</li>
                                <li style="padding-right: 20px;">{{  $student->student_gender }}</li>
                            </ul>
                        </td>
                        <td>
                            <p>{{  $student->user->name }}様</p>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <div id="pagination">
                {{ $students->links() }}
            </div>
        </div>
        <div class="register">
            <a href="{{ route('attendanceList') }}">もどる</a>
        </div>
    </div>
</div>
@endsection

