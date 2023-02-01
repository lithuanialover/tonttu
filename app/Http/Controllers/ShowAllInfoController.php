<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Late;
use App\Models\LeaveEarly;
use App\Models\Student;
use App\Models\User;

use Carbon\Carbon; //Carbonを使うuse文

use Illuminate\Http\Request;

class ShowAllInfoController extends Controller
{
    public function detail($id){

        $student_id = $id;

        $today_start = Carbon::today()->format('Y-m-d 00:00:00');
        $today_end = Carbon::today()->format('Y-m-d 23:59:59');

        $today = Carbon::today()->format('Y年m月d日');

        
        //該当する「生徒情報」を取得

        $student = Student::find($student_id);

        // dd($student);

        //「保護者情報」を取得
        // 1. Student&userの紐づけ完成
        // $parent = Student::with('user')->where('user_id', '=', $student->user_id)->get();

        // 指定Studentに紐づく「保護者情報」を取得。get()エラーでた
        $parent = Student::with('user')->where('id', '=', $student_id)->first();
        
        // dd($parent);

        //「本日の登園情報」を取得
        //「本日の降園情報」を取得
        $attendance = Attendance::with(['student'])->where('student_id', '=', $student_id )->whereDate('created_at', Carbon::today())->first();

        // dd($attendance);

        //「本日の遅刻情報」を取得
        $late = Late::whereBetween('lateness.day', [$today_start, $today_end])
        ->with('student')->where('student_id', '=', $student_id)
        ->first();

        // dd($late);

        //「本日の早退情報」を取得
        $leaveEarly = LeaveEarly::whereBetween('leaveearlies.day', [$today_start, $today_end])
        ->with('student')->where('student_id', '=', $student_id)
        ->first();

        // dd($leaveEarly);

        //「本日の欠席情報」を取得
        $absent = Absence::whereBetween('absences.absentDay', [$today_start, $today_end])
        ->with('student')->where('student_id', '=', $student_id)
        ->first();
        
        return view('admin.detail', compact('student', 'parent', 'attendance', 'late', 'leaveEarly', 'absent', 'today'));
    }
}