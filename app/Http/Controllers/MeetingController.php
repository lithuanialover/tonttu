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

        $eventHistories = Meeting::orderBy('eventDay', 'asc')->paginate(3);

        // dd($eventHistories);

        return view('admin.meeting.index', compact('eventHistories'));
    }
}