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

        return view('auth.meeting.index', compact('meetingAttendances'));
    }

    public function create($id){

        // dd($id); meetingAttendances tableのid
        
        #①$iをもとに、該当するデータを取得→ログイン中のuser_id$該当するmeeeting_idも取得できている
        $meetingAttendance = MeetingAttendance::find($id);
        // dd($meetingAttendance);

        #②MeetingAttendanceのmeeting_idを取得
        $meeting_id = $meetingAttendance->meeting_id; //2
        // dd($meeting_id);

        #③取得したmeeting_idに該当するデータをmeeting tableから取得
        $meeting = Meeting::find($meeting_id);
        //dd($meeting);

        return view('auth.meeting.create', compact('meetingAttendance', 'meeting'));
    }

    public function attend(Request $request, $id)
    {

        $meeting = MeetingAttendance::find($id);
        $meeting->user_id = $request->user_id;
        $meeting->meeting_id = $request->meeting_id;
        $meeting->type_id = $request->type_id;
        $meeting->save();

        return redirect()->route('meetingAttendance.index')->with('complete', '「出席」登録しました。');
    }

    public function absent(Request $request, $id)
    {

        $meeting = MeetingAttendance::find($id);
        $meeting->user_id = $request->user_id;
        $meeting->meeting_id = $request->meeting_id;
        $meeting->type_id = $request->type_id;
        $meeting->save();

        return redirect()->route('meetingAttendance.index')->with('complete', '「欠席」登録しました。');
    }
}