<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function User_details(){
        return $this->hasMany(User_details::class);
    }

}
