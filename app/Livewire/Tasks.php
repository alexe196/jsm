<?php

namespace App\Livewire;


use App\Models\TaskStatus;
use Livewire\Component;
use App\Repository\RepositoryTaskStatusTime;
use App\Repository\RepositoryTask;

class Tasks extends Component
{

    public $task_satus_select;

    public $task_status_id = [];

    public $user_id;

    public $id;

    public $name;

    public $description;

    public $tasks;
    public $showingModal = false;


    protected $rulesTaskStatus = [
        'task_status_id' => 'required',
    ];

    public function rules()
    {
        return [
                'name' => 'required|string|max:250|min:3',
                'description' => 'required|string|max:250|min:3',
        ];
    }


    public function setNullProperty() {
        $this->name = null;
        $this->description = null;
    }

    public function showModal(){
        $this->setNullProperty();
        $this->showingModal = true;
    }

    public function hideModal(){
        $this->showingModal = false;
    }


    private function getTasks() {
        $this->tasks = RepositoryTask::getTasksNoReady();
    }

    private function taskStatus() {
        $this->task_satus_select =  TaskStatus::all();
    }

    public function render()
    {
        $this->getTasks();
        $this->taskStatus();

        return view('livewire.tasks');
    }

    public function update_status_task($id)
    {
        $data['task_id'] = (int) $id;
        $data['task_status_id'] = (int) array_shift($this->task_status_id);

         $this->validateOnly($data['task_status_id'], $this->rulesTaskStatus);


        if(RepositoryTask::updateTask($data)) {
            RepositoryTaskStatusTime::createTaskStatusTime($data);
        }
    }

    public function add_task()
    {
        $data['name'] = $this->name;
        $data['description'] = $this->description;

        $this->validate();

        $data['task_status_id'] = 1;

        if($id = RepositoryTask::createTask($data)) {
            $data['task_id'] = $id;
            RepositoryTaskStatusTime::createTaskStatusTime($data);
            $this->hideModal();
        }
    }
}
