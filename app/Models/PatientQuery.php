<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientQuery extends Model
{
    protected $table = "patient_queries";

    protected $fillable = [
        'user_id',
        'question',
        'question_date',
        'response',
        'response_date',
    ];

    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
