<?php

namespace App\Livewire;

use App\Reposytori\ReposytoriTask;
use Livewire\Component;
use App\Reposytori\ReposytoriTaskStatusTime;
use App\Reposytori\TaskStatusReposytori;



class TaskReady extends Component
{

    public $id;
    public $tasstatus;
    public $taskstatus;
    public $task_status_id;
    public $user_id;

    public function getTaskStatusTime() {
        $this->taskstatus = TaskStatusReposytori::getTaskStatusArr();
    }

    public function delete($id)
    {
        ReposytoriTaskStatusTime::deleteTaskStatusTime($id);
        ReposytoriTask::delete($id);
    }


    public function render()
    {
        $this->getTaskStatusTime();
        return view('livewire.task-ready', [
            'tasks' => ReposytoriTask::getTasksReady(),
        ]);
    }
}
