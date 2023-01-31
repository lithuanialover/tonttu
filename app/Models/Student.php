<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'student_kana',
        'student_gender',
        'student_image',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // 1対多の関係でリレーションを設定 Student→Attendance(Userが1)(Attendanceが多)
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // 1対多の関係でリレーションを設定 Student→Absence(Userが1)(Absenceが多)
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    // 1対多の関係でリレーションを設定 Student→Lateness(Userが1)(Lateが多)
    public function lateness()
    {
        return $this->hasMany(Late::class);
    }

    // 1対多の関係でリレーションを設定 Student→LeaveEarly(Userが1)(Absenceが多)
    public function leaveEarlies()
    {
        return $this->hasMany(LeaveEarly::class);
    }
}