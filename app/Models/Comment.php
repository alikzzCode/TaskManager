<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use HasFactory , LogsActivity;
    public $guarded = [];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }
}
