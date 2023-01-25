<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingAttendance;

class MeetingAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingAttendance::create([
            'meeting_id' => 1,
            'type_id' => 99,
        ]);

        MeetingAttendance::create([
            'meeting_id' => 2,
            'type_id' => 99,
        ]);

        MeetingAttendance::create([
            'meeting_id' => 3,
            'type_id' => 99,
        ]);

        MeetingAttendance::create([
            'meeting_id' => 4,
            'type_id' => 99,
        ]);

        MeetingAttendance::create([
            'meeting_id' => 5,
            'type_id' => 99,
        ]);
    }
}
