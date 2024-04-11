<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class TaskReady extends Component
{

    public $id;
    public $tasstatus;
    public $task_status_id;
    public $user_id;




    public function getTasks() {
        $this->tasks = Task::where(['user_id' => Auth::user()->id])->where('task_status_id', '=', TaskStatus::STATUS_READY)->get();
    }

    public function delete($id)
    {
        if( $task = Task::find($id) ) {
            $task->delete();
            //$this->getTasks();
        }
    }


    public function render()
    {


        return view('livewire.task-ready', [
            'tasks' => Task::where(['user_id' => Auth::user()->id])->where('task_status_id', '=', TaskStatus::STATUS_READY)->get(),
        ]);
    }
}
