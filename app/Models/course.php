<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_courses',
        'discription',
    ];

    public function Users(){
        return $this->belongsToMany(User::class)
                ->withPivot('mark');
        
    }

    public function lecture(){
        return $this->hasMany(lecture::class);
    }
}
