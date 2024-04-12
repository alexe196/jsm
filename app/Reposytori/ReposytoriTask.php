<?php


namespace App\Reposytori;


use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;

class ReposytoriTask
{

    public static function getTasks() {
        return Task::where(['user_id' => Auth::user()->id])->where('task_status_id', '!=', TaskStatus::STATUS_READY)->get();
    }

    public static function getTasksReady() {
        return Task::where(['user_id' => Auth::user()->id])->where('task_status_id', '=', TaskStatus::STATUS_READY)->get();
    }

    public static function edit($task_id, $task_status_id)
    {
        if ($task = Task::find($task_id)) {
            $task->task_status_id = $task_status_id;
            $task->update();
            return true;
        }

        return false;
    }

    public static function delete($id)
    {
        if ($task = Task::find($id)) {
            $task->delete();
        }
    }

    public static function save(array $data) {
        $task = Task::create([
            'task_status_id' => $data['task_status_id'],
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return !empty($task->id) ? $task->id : null;
    }

}
