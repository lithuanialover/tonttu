<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB; // ←これを追加
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)
        //     ->create()
        //     ->each(function ($user){
        //         Student::factory(2)
        //         ->create(['user_id' => $user->id])
        //         ->each(function($student){
        //             Attendance::factory(30)->create([
        //                 'student_id'=> $student->id
        //             ]);
        //         });
        //     });

        $names = [
          //$smallLetter => $capitalLetter,
            'james' => 'James',
            'robert' => 'Robert',
            'patricia' => 'Patricia',
            'john' => 'John',
            'jennifer' => 'Jennifer',
            'michael' => 'Michael',
            'linda' => 'Linda',
            'david' => 'David',
            'william' => 'William',
            'Elizabeth' => 'Elizabeth'
        ];

        foreach ($names as $smallLetter => $capitalLetter) {

            User::create([
                'name' => $capitalLetter, // ユーザー名
                'email' => $smallLetter .'@example.com', // 👈 メールアドレス
                'password' => bcrypt('password') // 👈 パスワード
            ]);

        }
    }
}
