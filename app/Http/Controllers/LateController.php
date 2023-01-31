<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\LateRequest;


class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lateHistories = Late::with('student')
        ->whereHas('student', function ($q) {
            $q->where('user_id', \Auth::id());
        })
            ->paginate(3);

        // dd($absenceHistories);

        return view('auth.late.index', compact('lateHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ログイン中のユーザーに紐ずくstudent_idを全て取得
        $students = \Auth::user()->students;

        return view('auth.late.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LateRequest $request)
    {
        Late::create([
            'student_id' => $request->student_id,
            'day' => $request->day,
            'time' => $request->time,
            'parent' => $request->parent,
        ]);

        return redirect()->route('lates.index')
        ->with('complete', '新規作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Late  $late
     * @return \Illuminate\Http\Response
     */
    public function show(Late $late)
    {
        $student_id = $late->student_id;

        $student = Student::find($student_id);

        return view('auth.late.show', compact('late', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Late  $late
     * @return \Illuminate\Http\Response
     */
    public function edit(Late $late)
    {
        $student_id = $late->student_id;

        $student = Student::find($student_id);

        return view('auth.late.edit', compact('late', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Late  $late
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Late $late)
    {
        // 更新
        $late->update([
            'student_id' => $request->student_id,
            'day' => $request->day,
            'time' => $request->time,
            'parent' => $request->parent,
        ]);

        return redirect()->route('lates.index')
        ->with('complete', '更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Late  $late
     * @return \Illuminate\Http\Response
     */
    public function destroy(Late $late)
    {
        $late->delete();

        return redirect()->route('lates.index')
        ->with('complete', '削除しました。');
    }
}