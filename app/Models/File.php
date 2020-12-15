<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "files";

    protected $fillable = ['file', 'visit_id'];


public function visits()
{
    return $this->belongsTo(Visit::class);
}

}
