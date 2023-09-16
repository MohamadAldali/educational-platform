<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Console\View\Components\Warn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'num',
        'password',
        'is_attend',
        'is_checked',
        'is_active',
        'gender',
        'birth_date',
        'join_date',
        'image',
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
        'password' => 'hashed',
    ];


    public function work(){
        return $this->hasMany(work::class);
    }

    public function certificate(){
        return $this->hasMany(certificate::class);
    }

   
    public function courses(){
        return $this->belongsToMany(course::class);
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_user', 'user_id', 'lecture_id')
            ->withPivot('is_attend'); // إذا كان لديك حقل إضافي في جدول العلاقة
    }
  

}
