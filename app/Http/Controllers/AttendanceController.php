<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon; //Carbonを使うuse文
use App\Http\Requests\StudentRequest; #Validation for the students table

class AttendanceController extends Controller
{
    public function index(){

        // 当日の登園・降園の一覧
        $attendanceStudents = Attendance::with('student')->orderBy('student_id', 'asc')->with(['student'])->whereDate('created_at', Carbon::today())->paginate(2);

        // 当日の欠席一覧
        $today_start = Carbon::today()->format('Y-m-d 00:00:00');
        $today_end = Carbon::today()->format('Y-m-d 23:59:59');

        $todaysAbsents = Absence::whereBetween('absences.absentDay', [$today_start, $today_end])
        ->with('student')
        ->get();

        // dd($todaysAbsents);

        return view('admin.attendance.index',compact('attendanceStudents', 'todaysAbsents'));
    }

    /**
     * 「登園・降園」過去のリスト一覧を取得
     */
    public function showHistory(){

        // $attendanceStudents = Attendance::with('student')->orderBy('student_id', 'asc')->with(['student'])->orderBy('created_at', 'asc')->paginate(5);
        $attendanceStudents = Attendance::orderBy('created_at', 'asc')->paginate(5);


        return view('admin.attendance.list',compact('attendanceStudents'));
    }

    /**
     * 【会員ページ】「登園・降園」当日の情報だけ取得
     */
    public function attendanceCheck(){

        /*ログイン中のユーザーIDをもとに注文情報を取得する。
        *【To Do】
            ・条件設定「今日の日付のみ取得」ができていない

            Carbonファサードで指定日の最初と最後を得ることができます。
        */

        $today_start = Carbon::today()->format('Y-m-d 00:00:00');
        $today_end = Carbon::today()->format('Y-m-d 23:59:59');

        $attendanceStudents = Attendance::whereBetween('attendances.punchIn', [$today_start, $today_end]) //条件１：ログインユーザーに紐づくstudentsテーブルのみ取得
        ->with('student')
        ->whereHas('student', function($q){
            $q->where('user_id', \Auth::id());
        })
        ->paginate(3);

        // dd($attendanceStudents);

        return view('auth.attendance.list',compact('attendanceStudents'));
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
        $qrResult = Student::find($id);

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
        $attended = Attendance::where('student_id', $student_id)
            ->whereDate('created_at', Carbon::today()) // created_at is just an example
            ->exists();

        if ($attended) {
            // The user already has attended, so lets redirect back/abort etc
            return redirect()->back()->with('error','既に登園手続き済です。');;
        }

        Attendance::create([
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
