<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function getTable()
    {
        return parent::getTable();
    }

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

    public function taskstatus()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id', 'id');
    }

    public function taskstatustime()
    {
        return $this->hasMany(TaskStatusTime::class, 'id', 'task_status_id');
    }

}
