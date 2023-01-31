<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Late;


class LateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Late::create([
            'day' => Carbon::today()->toDateString(),
            'time' => Carbon::now()->addHour(1),
            'parent' => 'お母さん',
            'student_id' => 11,
        ]);
    }
}