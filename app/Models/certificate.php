<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_cert',
        'date',
        'donor',
        'user_id'
    ];
    
    public function User(){
        return $this->belongsTo(User::class);
    }

}
