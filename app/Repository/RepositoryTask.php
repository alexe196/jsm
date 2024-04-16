<?php


namespace App\Repository;


use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;

class RepositoryTask
{

    public static function getTasksNoReady() {
        return Auth::user()->task()->where('task_status_id', '!=', TaskStatus::STATUS_READY)->get();
    }

    public static function getTasksReady() {
        return Auth::user()->task()->where(['user_id' => Auth::user()->id])->where('task_status_id', '=', TaskStatus::STATUS_READY)->get();
    }

    public static function updateTask($data)
    {
        if ($task = Task::find($data['task_id'])) {
            $task->task_status_id = $data['task_status_id'];
            $task->update();
            return true;
        }

        return false;
    }

    public static function deleteTask($id)
    {
        if ($task = Task::find($id)) {
            $task->delete();
        }
    }

    public static function createTask(array $data) {
        $task = Task::create([
            'task_status_id' => $data['task_status_id'],
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return !empty($task->id) ? $task->id : null;
    }

}
