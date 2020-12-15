<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    protected $table = "visits_requests";

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'last_visit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
