<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\MeetingAttendance;
use App\Models\MeetingAttendanceType;
use App\Models\User;
use App\Http\Requests\MeetingRequest;


class MeetingController extends Controller
{
    public function index(){

        $eventHistories = Meeting::orderBy('eventDay', 'asc')->paginate(3);

        // dd($eventHistories);

        return view('admin.meeting.index', compact('eventHistories'));
    }

    /**
     * display a form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meeting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        // Meeting::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'eventDay' => $request->eventDay,
        //     'startTime' => $request->startTime,
        //     'endTime' => $request->endTime,
        //     'deadline' => $request->deadline,
        // ]);

        $meeting = new Meeting();
        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->eventDay = $request->eventDay;
        $meeting->startTime = $request->startTime;
        $meeting->endTime = $request->endTime;
        $meeting->deadline = $request->deadline;
        $meeting->save();

        $attendance = new MeetingAttendance();
        $attendance->meeting_id = $meeting->id;
        $attendance->type_id = MeetingAttendanceType::TYPE_NOT_YET;
        $attendance->save();

        return redirect()->route('meetingList')->with('complete', '新規作成しました。');
    }
}