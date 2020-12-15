<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visits";

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'conclusion',
        'documents',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
