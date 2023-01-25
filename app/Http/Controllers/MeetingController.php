<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\MeetingAttendance;
use App\Models\MeetingAttendanceType;
use App\Models\User;

class MeetingController extends Controller
{
    public function index(){

        $eventHistories = MeetingAttendance::paginate(3);

        // dd($absenceHistories);

        return view('admin.meeting.index', compact('eventHistories'));
    }
}
