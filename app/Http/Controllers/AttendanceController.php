<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon; //Carbonを使うuse文
use App\Http\Requests\StudentRequest; #Validation for the students table

class AttendanceController extends Controller
{
    public function index(){

        $attendanceStudents = Attendance::with('student')->orderBy('student_id', 'asc')->with(['student'])->paginate(1); //園児のFKを昇順に並べる

        return view('admin.attendance.index',compact('attendanceStudents'));
    }

    /**
     * 「登園用」QR読み取り画面を表示
     */
    public function attendance()
    {
        return view('admin.attendance.attendance');
    }

    /**
     * 「登園用」QRコードから読み取ったデータを使い、studentsテーブルからデータを取得
     */
    public function attendanceAjax ($id)
    {

        // $studentKana = Student::find($id, ['student_kana']); //studentsテーブルから該当するidを元に「student_kana」カラムのみ取得
        $qrResult = Student::find($id); //studentsテーブルから該当するidを元に全カラム取得

        return response()->json(['qrResult' => $qrResult]);
    }

    /**
     * 「登園用」"はい"をクリックしたときに、attendancesテーブルのカラム「punchIn」のデータを登録する
     */
    public function punchIn(Request $request){

        $student_id = $request->student_id; //$requestの後ろは、<input type='hidden' id='studentId' name="student_id"/>の name="student_id"が入る = QRコードが持つデータ

        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldTimestamp = Attendance::where('student_id', $student_id)->latest()->first(); //attendancesテーブルのstudent_idカラム = studentsテーブルのid
        if ($oldTimestamp) {
            // $oldTimestampPunchIn = new Carbon($oldTimestamp->punchIn);
            // $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
            // URL: https://github.com/rinonkia/AttendanceSystem/blob/master/app/Http/Controllers/TimestampsController.php
        }

        $newTimestampDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        // if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
        //     return redirect()->back()->with('error', 'すでに登園打刻がされています');
        // }

        $student_id = $request->student_id; //$requestの後ろは、<input type='hidden' id='studentId' name="student_id"/>の name="student_id"が入る

        $timestamp = Attendance::create([
            'student_id' => $student_id,
            'punchIn' => Carbon::now(),
        ]);

        return redirect()->route('attendance')
                        ->with('success','登園手続きが完了しました。');
    }

    /**
     * 「降園用」QR読み取り画面を表示
     */
    public function leave()
    {
        return view('admin.attendance.leave');
    }

    /**
     * 「降園用」"はい"をクリックしたときに、attendancesテーブルのカラム「punchOut」のデータを登録する
     */
    public function punchOut(Request $request)
    {
        $student_id = $request->student_id; //$requestの後ろは、<input type='hidden' id='studentId' name="student_id"/>の name="student_id"が入る = QRコードが持つデータ

        $timestamp = Attendance::where('student_id', $student_id)->latest()->first();

        if( !empty($timestamp->punchOut)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update([
            'punchOut' => Carbon::now()
        ]);

        return redirect()->back()->with('success', '降園手続きが完了しました');
    }
}
