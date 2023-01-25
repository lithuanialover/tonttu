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

        $meetings = Meeting::with('attendances')->paginate(3);

        // dd($meetings);

        return view('auth.meeting.index', compact('meetings'));
    }
}