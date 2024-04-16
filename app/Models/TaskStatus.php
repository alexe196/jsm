<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    const STATUS_PROCESS = 1;
    const STATUS_ERROR = 2;
    const STATUS_READY = 3;


    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name'
    ];

    public function task()
    {
        return $this->hasMany(Task::class, 'task_status_id', 'id');
    }

    public function task_status_time()
    {
        return $this->hasMany(TaskStatusTime::class, 'task_status_id', 'id');
    }
}
