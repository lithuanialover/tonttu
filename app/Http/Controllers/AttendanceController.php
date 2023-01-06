<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest; #Validation for the students table

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('admin.attendance.attendance');
    }

    public function attendanceAjax ($id)
    {

        $getStudentData = Student::where('id', $id)->get(); //idに該当するデータをstudentsテーブルから取得

        return $getStudentData;
    }

    public function leave()
    {
        return view('admin.attendance.leave');
    }
}
