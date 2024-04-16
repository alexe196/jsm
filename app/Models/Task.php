<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $table='task';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'task_status_id',
        'user_id',
        'name',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id', 'id');
    }

    public function task_status_time()
    {
        return $this->hasMany(TaskStatusTime::class, 'task_id', 'id');
    }

}
