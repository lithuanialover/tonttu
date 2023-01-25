<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingAttendance;
use App\Models\User;

class MeetingAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all();

        // dd($user_ids);

        foreach ($user_ids as $user_id) {
            MeetingAttendance::create([
                'user_id' => $user_id->id,
                'meeting_id' => 1,
                'type_id' => 99,
            ]);
        }

        #meeting_id 1~5をseederで作成したい！
    }
}