<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model
{
    use HasFactory,LogsActivity;
    public $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class,'file_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'task_id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
