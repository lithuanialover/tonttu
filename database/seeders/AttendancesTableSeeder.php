<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Attendance;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 1,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 2,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 3,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 4,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 5,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 6,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 7,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 8,
        ]);

        Attendance::create([
            'punchIn' => Carbon::now(),
            'punchOut' => Carbon::now(),
            'student_id' => 9,
        ]);
    }
}
