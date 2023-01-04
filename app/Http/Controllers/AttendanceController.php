<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('admin.attendance.attendance');
    }

    public function leave()
    {
        return view('admin.attendance.leave');
    }
}
