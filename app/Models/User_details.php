<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_checked',
        'is_active',
        'gender',
        'language',
        'birth_date',
        'join_date',
        'image',
        'type_user_id'
    ];

    public function Users(){
        return $this->belongsTo(User::class);
    }
}
