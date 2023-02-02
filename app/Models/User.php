<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Student;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1対多の関係でリレーションを設定 User→Student(Userが1)(studentが多)
    public function students()
    {
        return $this->hasMany(Student::class);
        //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    // 1対多の関係でリレーションを設定 User→Student(Userが1)(studentが多)
    public function meetingAttendances()
    {
        return $this->hasMany(MeetingAttendance::class,'user_id', 'id');
        //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}