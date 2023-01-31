<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveEarly extends Model
{
    use HasFactory;

    protected $table = "leaveEarlies";

    protected $fillable = [
        'day',
        'time',
        'parent',
        'student_id',
    ];

    /**
     * ユーザー関連付け
     * one to many
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}