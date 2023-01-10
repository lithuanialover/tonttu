<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'punchIn',
        'punchOut',
        'student_id',
    ];

    /**
     * ユーザー関連付け
     * one to many
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
