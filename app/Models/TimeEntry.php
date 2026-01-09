<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'started_at',
        'stopped_at',
        'duration'
    ];
}
