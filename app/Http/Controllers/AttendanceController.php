<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest; #Validation for the students table

class AttendanceController extends Controller
{
    public function index(){

        $attendanceStudents = Attendance::get(); //->orderby($student_id) 園児のFK順に並べる

        return view('admin.attendance.index',compact('attendanceStudents'));
    }

    public function attendance()
    {
        return view('admin.attendance.attendance');
    }

    public function attendanceAjax (Request $request)
    {
        // contentは、QR読み取ったデータを定義したもの。詳細は、app.js。scanner.addListener('scan', function (content) {}
        $id = $request->content; //QR読み込みの値を$request->contentで取得、$idに代入する。$idがstudentsテーブル
        // dd($request);

        // $id = 1; //student_id のデータをとれた。

        $studentId = Student::find($id);

        return response()->json($studentId);
    }

    public function leave()
    {
        return view('admin.attendance.leave');
    }
}
