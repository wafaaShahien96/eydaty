<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeExRequest extends Model
{
    protected $table = "home_ex_requests";

    protected $fillable = [
        'user_id',
        'required_date',
        'accepted_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
