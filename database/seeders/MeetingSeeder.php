<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Meeting;


class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * total: 5 data
     *
     * @return void
     */
    public function run()
    {
        Meeting::create([
            'name' => '節分の会',
            'description' => '鬼さんと豆まきをします。',
            'eventDay' => Carbon::now()->addMonth(2),
            'startTime' => Carbon::now()->addHour(1),
            'endTime' => Carbon::now()->addHour(2),
            'deadline' => Carbon::now()->addMonth(1),
        ]);

        // Meeting::create([
        //     'name' => 'お花見',
        //     'description' => '桜の下でお弁当を食べます。',
        //     'eventDay' => Carbon::now()->addMonth(2),
        //     'startTime' => Carbon::now()->addHour(1),
        //     'endTime' => Carbon::now()->addHour(2),
        //     'deadline' => Carbon::now()->addMonth(3),
        // ]);

        // Meeting::create([
        //     'name' => 'プール',
        //     'description' => '水遊びをします。',
        //     'eventDay' => Carbon::now()->addMonth(3),
        //     'startTime' => Carbon::now()->addHour(1),
        //     'endTime' => Carbon::now()->addHour(2),
        //     'deadline' => Carbon::now()->addMonth(4),
        // ]);

        // Meeting::create([
        //     'name' => 'お芋ほり',
        //     'description' => 'サツマイモを掘りに行きます。',
        //     'eventDay' => Carbon::now()->addMonth(4),
        //     'startTime' => Carbon::now()->addHour(1),
        //     'endTime' => Carbon::now()->addHour(2),
        //     'deadline' => Carbon::now()->addMonth(5),
        // ]);

        // Meeting::create([
        //     'name' => '運動会',
        //     'description' => 'ダンス・かけっこをします。',
        //     'eventDay' => Carbon::now()->addMonth(5),
        //     'startTime' => Carbon::now()->addHour(1),
        //     'endTime' => Carbon::now()->addHour(2),
        //     'deadline' => Carbon::now()->addMonth(6),
        // ]);
    }
}