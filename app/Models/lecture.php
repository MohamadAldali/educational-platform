<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecture extends Model
{
    use HasFactory;



    protected $fillable = [
        'num_le',
        'discription_le',
        'videoPath',
        'course_id',
        'is_attend'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'lecture_user', 'lecture_id', 'user_id')
            ->withPivot('is_attend'); // إذا كان لديك حقل إضافي في جدول العلاقة
    }
    
    public function course(){
        return $this->belongsTo(course::class);
    }

}
