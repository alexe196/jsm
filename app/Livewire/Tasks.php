<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tasks extends Component
{

    public $tasstatus;
    public $task_status_id;
    public $user_id;
    public $name;
    public $description;
    public $tasks;


    public function getTasks() {
        $this->tasks = Task::where(['user_id' => Auth::user()->id])->get();
    }


    public function taskStatus() {
        $this->tasstatus =  TaskStatus::all();
    }

    public function render()
    {
        $this->getTasks();
        $this->taskStatus();

        return view('livewire.tasks');
    }

    public function save()
    {
        Task::create([
            'task_status_id' => $this->task_status_id,
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'description' => $this->description,
        ]);

        return redirect()->to('/tasks')
            ->with('status', 'Post created!');
    }
}
