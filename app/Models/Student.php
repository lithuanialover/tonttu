<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

        /**
     * テーブルに関連付ける主キー
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    protected $fillable =[
        'student_name',
        'student_kana',
        'student_gender',
        'student_image',
    ];

    // 1対多の関係でリレーションを設定 User→Student (Userが1)(Studentが多)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
