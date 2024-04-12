<?php

namespace App\Livewire;

use App\Models\TaskStatus;
use Livewire\Component;
use App\Reposytori\ReposytoriTaskStatusTime;
use App\Reposytori\ReposytoriTask;

class Tasks extends Component
{

    public $id;
    public $itemid = [];
    public $tasstatus;
    public $task_status_id;
    public $user_id;
    public $name;
    public $description;
    public $tasks;
    public $isOpen = false;


    private function getTasks() {
        $this->tasks = ReposytoriTask::getTasks();
    }

    private function taskStatus() {
        $this->tasstatus =  TaskStatus::all();
    }

    public function render()
    {
        $this->getTasks();
        $this->taskStatus();

        return view('livewire.tasks');
    }

    public function edit($id)
    {
        if(ReposytoriTask::edit($id, $this->task_status_id)) {
            ReposytoriTaskStatusTime::createTaskStatusTime($this->task_status_id,$id);
        }
    }

    public function save()
    {
        $data['task_status_id'] = $this->task_status_id;
        $data['name'] = $this->name;
        $data['description'] = $this->description;

        if($id = ReposytoriTask::save($data)) {
            ReposytoriTaskStatusTime::createTaskStatusTime($this->task_status_id, $id);
        }
    }
}
