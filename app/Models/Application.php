<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     protected $table = 'applications';
    protected $fillable = [
        'job_id',
        'user_id',
        'cover_letter',
        'cv_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
