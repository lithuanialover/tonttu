<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Late;
use App\Models\LeaveEarly;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;

class ShowAllInfoController extends Controller
{
    public function detail(){

        return view('admin.detail', compact(''));
    }
}