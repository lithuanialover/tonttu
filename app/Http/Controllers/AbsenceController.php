<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\AbsenceRequest;
use Carbon\Carbon; //Carbonを使うuse文

class AbsenceController extends Controller
{
    // /**
    //  * Display history.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {

        $absenceHistories = Absence::with('student')
        ->whereHas('student', function($q){
            $q->where('user_id', \Auth::id());
        })
        ->paginate(3);

        // dd($absenceHistories);

        return view('auth.absence.index', compact('absenceHistories'));
    }

    /**
     * display a form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ログイン中のユーザーに紐ずくstudent_idを全て取得
        $students = \Auth::user()->students;

        return view('auth.absence.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsenceRequest $request)
    {
        Absence::create([
            'student_id' => $request->student_id,
            'absentDay' => $request->absentDay,
            'absentReason' => $request->absentReason,
        ]);

        return redirect()->route('absences.index')
                        ->with('complete','新規作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {

        $student_id = $absence->student_id;

        $student = Student::find($student_id);

        return view('auth.absence.show',compact('absence', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        $student_id = $absence->student_id;

        $student = Student::find($student_id);

        return view('auth.absence.edit',compact('absence', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(AbsenceRequest $request, Absence $absence)
    {
        // 商品をデータベースに登録
        $absence->update([
            'student_id' => $request->student_id,
            'absentDay' => $request->absentDay,
            'absentReason' => $request->absentReason,
        ]);

        return redirect()->route('absences.index')
                        ->with('complete','更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();

        return redirect()->route('absences.index')
                        ->with('complete','削除しました。');
    }
}
