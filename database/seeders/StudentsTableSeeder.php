<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->count(10)->create();

        // Student::create([
        //     'student_name' => 'Richard',
        //     'student_kana' => 'リチャード',
        //     'student_gender' => '男の子',
        //     'student_image' => storage_path('app/public/students/kids1.jpg'),
        //     'user_id' => '1'
        // ]);
    }
}
