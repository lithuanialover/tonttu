<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\LeaveEarly;

class LeaveEarlyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveEarly::create([
            'day' => Carbon::today()->toDateString(),
            'time' => Carbon::now()->addHour(5),
            'parent' => 'お母さん',
            'student_id' => 6,
        ]);
    }
}