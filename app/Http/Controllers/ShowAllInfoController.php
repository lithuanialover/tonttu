<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Late;
use App\Models\LeaveEarly;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;

class ShowAllInfoController extends Controller
{
    public function detail($id){

        $student_id = $id;
        
        
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


        //「本日の遅刻情報」を取得


        //「本日の早退情報」を取得


        //「本日の欠席情報」を取得
        // $absence = Absence::find($student_id);


        
        return view('admin.detail', compact('student', 'parent'));
    }
}