<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = "pricing";

    protected $fillable = [
        'feas',
        'home_feas',
        'agence_feas',
        'follow_up',
    ];
}
