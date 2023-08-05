<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    public $guarded = [];
    public function task()
    {
        return $this->belongsTo(Task::class,'file_id');
    }
}
