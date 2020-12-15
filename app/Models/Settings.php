<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = "settings";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'about_us',
        'FB_link',
        'TW_link',
    ];
}
