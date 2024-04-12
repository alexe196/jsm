<?php


namespace App\Reposytori;


use App\Models\TaskStatus;

class TaskStatusReposytori
{

    public static function getTaskStatus() {
        return TaskStatus::all();
    }

    public static function getTaskStatusArr() {
        $res = [];
        $task =  TaskStatus::all();
        if(!empty($task)) {
            foreach ($task as $item) {
                $res[$item->id] = $item->name;
            }
        }

        return $res;
    }
}
