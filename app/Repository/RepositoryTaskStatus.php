<?php


namespace App\Repository;


use App\Models\TaskStatus;

class RepositoryTaskStatus
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
