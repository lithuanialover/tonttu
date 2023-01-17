<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Absence;

class AbsencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Absence::create([
            'absentDay' => Carbon::today()->toDateString(),
            'absentReason' => '体調不良',
            'student_id' => 10,
        ]);
    }
}
