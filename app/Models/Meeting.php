<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'eventDay',
        'startTime',
        'endTime',
        'deadline',
    ];

    // Relationship
    public function attendances()
    {
        return $this->hasMany(MeetingAttendance::class, 'meeting_id', 'id');
    }
}
