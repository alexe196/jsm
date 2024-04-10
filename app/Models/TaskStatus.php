<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;


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

    public function taskstatustime()
    {
        return $this->hasMany(TaskStatusTime::class, 'task_status_id', 'id');
    }
}
