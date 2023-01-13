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
        return view('auth.absence.index');
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
                        ->with('success','新規作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
