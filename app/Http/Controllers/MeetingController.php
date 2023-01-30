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
    public function index(Request $request)
    {

        $eventHistories = Meeting::orderBy('eventDay', 'asc')->paginate(3);

        // dd($eventHistories);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

                // クエリビルダ
        $query = Meeting::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }

            $eventHistories = $query->paginate(20);

        }

        return view('admin.meeting.index', compact('eventHistories', 'search'));
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

        // $attendance = new MeetingAttendance();
        // $attendance->meeting_id = $meeting->id;
        // $attendance->type_id = MeetingAttendanceType::TYPE_NOT_YET;
        // $attendance->save();

        $user_ids = User::all();


        // dd($user_ids);

        foreach ($user_ids as $user_id) {

            $attendance = new MeetingAttendance();
            $attendance->user_id = $user_id->id;
            $attendance->meeting_id = $meeting->id;
            $attendance->type_id = MeetingAttendanceType::TYPE_NOT_YET;
            $attendance->save();
        }

        return redirect()->route('meetingList')->with('complete', '新規作成しました。');
    }

    public function show($id)
    {

        $meeting = Meeting::find($id);

        #count関数
        $countUser = User::count();

        $countAttend = MeetingAttendance::where('meeting_id', $id)
                        ->where('type_id', 1)->count();

        $countAbsent = MeetingAttendance::where('meeting_id', $id)
        ->where('type_id', 2)->count();

        $countNotYet = MeetingAttendance::where('meeting_id', $id)
        ->where('type_id', 99)->count();
        
        return view('admin.meeting.show', compact('meeting', 'countUser', 'countAttend', 'countAbsent', 'countNotYet'));
    }

    public function edit($id)
    {

        $meeting = Meeting::find($id);

        return view('admin.meeting.edit', compact('meeting'));
    }

    public function update(MeetingRequest $request, $id)
    {
        // Meeting::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'eventDay' => $request->eventDay,
        //     'startTime' => $request->startTime,
        //     'endTime' => $request->endTime,
        //     'deadline' => $request->deadline,
        // ]);

        $meeting = Meeting::find($id);
        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->eventDay = $request->eventDay;
        $meeting->startTime = $request->startTime;
        $meeting->endTime = $request->endTime;
        $meeting->deadline = $request->deadline;
        $meeting->save();

        return redirect()->route('meetingList')->with('complete', '更新しました。');
    }

    public function destroy($id)
    {

        $meeting = Meeting::find($id);

        // レコードを削除
        $meeting->delete();

        return redirect()->route('meetingList')
        ->with('complete', '削除しました。');
    }
}