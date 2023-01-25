<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\User;
use App\Models\MeetingAttendance;
use App\Models\MeetingAttendanceType;

class MeetingAttendanceController extends Controller
{
    public function index()
    {
        #完成
        $meetingAttendances = MeetingAttendance::where('user_id', \Auth::id())
            ->with('meeting')
            ->paginate(3);

        // dd($meetingAttendances);

        #全ユーザーのイベントを取得(リレーションとれてる)
        // $meetings = Meeting::with('attendances')->paginate(3);

        #リレーションとれてるbut条件が反映されていない
        // $meetings = Meeting::with('attendances')
        // ->whereHas('attendances', function($q){
        //     $q->where('user_id', \Auth::id());
        // })
        // ->paginate(3);

        #リレーションができていない
        // $meetings = Meeting::whereHas('attendances', function($q){
        //     $q->where('user_id', \Auth::id());
        // })
        // ->paginate(3);

        #失敗
        // $meetings = Meeting::with('attendances')->where('user_id', \Auth::id())
        //     ->paginate(3);

        return view('auth.meeting.index', compact('meetingAttendances'));
    }
}