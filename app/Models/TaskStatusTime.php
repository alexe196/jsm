<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatusTime extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getTable()
    {
        return 'task_status_time';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'task_status_id',
        'task_id',
        'date'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id', 'id');
    }
}
