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

    public function attendanceAjax (Request $request, $id)
    {
        $studentData = Student::select('student_name')->get();

        return $studentData;
    }

    public function leave()
    {
        return view('admin.attendance.leave');
    }
}
