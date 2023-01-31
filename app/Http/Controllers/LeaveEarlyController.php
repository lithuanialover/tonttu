<?php

namespace App\Http\Controllers;

use App\Models\LeaveEarly;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveEarlyRequest;


class LeaveEarlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveEarlyHistories = LeaveEarly::with('student')
        ->whereHas('student', function ($q) {
            $q->where('user_id', \Auth::id());
        })
            ->paginate(3);

        // dd($absenceHistories);

        return view('auth.leaveEarly.index', compact('leaveEarlyHistories'));
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

        return view('auth.leaveEarly.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveEarlyRequest $request)
    {
        LeaveEarly::create([
            'student_id' => $request->student_id,
            'day' => $request->day,
            'time' => $request->time,
            'parent' => $request->parent,
        ]);

        return redirect()->route('leaveearlys.index')
        ->with('complete', '新規作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveEarly  $leaveEarly
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaveEarly = LeaveEarly::find($id);

        $student_id = $leaveEarly->student_id;

        $student = Student::find($student_id);

        // dd($leaveEarly);

        return view('auth.leaveEarly.show', compact('leaveEarly', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveEarly  $leaveEarly
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaveEarly = LeaveEarly::find($id);

        $student_id = $leaveEarly->student_id;

        $student = Student::find($student_id);

        return view('auth.leaveEarly.edit', compact('leaveEarly', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveEarly  $leaveEarly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 更新
        // $leaveEarly->update([
        //     'student_id' => $request->student_id,
        //     'day' => $request->day,
        //     'time' => $request->time,
        //     'parent' => $request->parent,
        // ]);

        $meeting = LeaveEarly::find($id);
        $meeting->student_id = $request->student_id;
        $meeting->day = $request->day;
        $meeting->time = $request->time;
        $meeting->parent = $request->parent;
        $meeting->save();

        return redirect()->route('leaveearlys.index')
        ->with('complete', '更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveEarly  $leaveEarly
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = LeaveEarly::find($id);

        // レコードを削除
        $meeting->delete();

        return redirect()->route('leaveearlys.index')
        ->with('complete', '削除しました。');
    }
}