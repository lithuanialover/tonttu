<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingAttendanceType;

class MeetingAttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            MeetingAttendanceType::TYPE_YES => '出席',
            MeetingAttendanceType::TYPE_NO => '欠席',
            MeetingAttendanceType::TYPE_NOT_YET => '未回答',
        ];

        foreach ($names as $id => $name) {

            $meeting_attendance_type = new MeetingAttendanceType();
            $meeting_attendance_type->id = $id;
            $meeting_attendance_type->name = $name;
            $meeting_attendance_type->save();
        }
    }
}
