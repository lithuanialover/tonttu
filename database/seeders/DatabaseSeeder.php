<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MeetingSeeder::class);
        // $this->call(MeetingAttendanceSeeder::class);
        $this->call(MeetingAttendanceTypeSeeder::class);

        // $this->call(StudentsTableSeeder::class);
    }
}
