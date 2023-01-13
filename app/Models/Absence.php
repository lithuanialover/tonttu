<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'absentDay',
        'absentReason'
    ];

    /**
     * ユーザー関連付け
     * one to many
     */
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
