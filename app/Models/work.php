<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name_works',
        'company',
        'start_date',
        'end_date',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
