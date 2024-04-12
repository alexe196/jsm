<?php


namespace App\Reposytori;


use App\Models\TaskStatusTime;
use Illuminate\Support\Carbon;

class ReposytoriTaskStatusTime
{
    public static function createTaskStatusTime($task_status_id, $task_id) {

        if(empty($task_status_id) || empty($task_id))
            return null;

        return TaskStatusTime::create([
            'task_status_id' => $task_status_id,
            'task_id' => $task_id,
            'date' => Carbon::now()->toDateTimeString()
        ]);
    }

    public static function getTaskStatusTime($task_id) {

        if(empty($task_id))
            return null;

        return TaskStatusTime::query()
            ->leftJoin('task_statuses', 'task_statuses.id', '=', 'task_status_time.task_status_id')
            ->where(['task_id' => $task_id])->get();
    }

    public static function deleteTaskStatusTime($task_id) {

        if(empty($task_id))
            return null;

        TaskStatusTime::query()->where(['task_id' => $task_id])->delete();
    }

}
