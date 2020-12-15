<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = [
        'phone', 'token' , 'created_at'
    ];

    public $timestamps = false;
}
