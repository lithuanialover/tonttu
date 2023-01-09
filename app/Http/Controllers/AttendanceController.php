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

    public function attendanceAjax ($id)
    {

        // $studentKana = Student::find($id, ['student_kana']); //studentsテーブルから該当するidを元に「student_kana」カラムのみ取得
        $qrResult = Student::find($id); //studentsテーブルから該当するidを元に全カラム取得

        // return response()->json($studentId);
        return response()->json(['qrResult' => $qrResult]);
    }

    public function leave()
    {
        return view('admin.attendance.leave');
    }
}
