<?php

namespace App\Livewire;

use App\Repository\RepositoryTask;
use Livewire\Component;
use App\Repository\RepositoryTaskStatusTime;
use App\Repository\RepositoryTaskStatus;



class TaskReady extends Component
{

    public $id;
    public $taskstatus;
    public $task_status_id;
    public $user_id;


    protected $rulesTaskStatus = [
        'id' => 'required|integer',
    ];

    public function taskStatusTime() {
        $this->taskstatus = RepositoryTaskStatus::getTaskStatusArr();
    }

    public function delete($id)
    {
        $this->validateOnly($id, $this->rulesTaskStatus);

        RepositoryTaskStatusTime::deleteTaskStatusTime($id);
        RepositoryTask::deleteTask($id);
    }


    public function render()
    {
        $this->taskStatusTime();
        return view('livewire.task-ready', [
            'tasks' => RepositoryTask::getTasksReady(),
        ]);
    }
}
