<?php

namespace App\Livewire;

use App\Models\Task as TaskModel;
use App\Trait\TaskValidationRules;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

class Task extends Component
{
    use TaskValidationRules;

    // Define layout for component
    #[Layout('layouts.app')]

    public $addModal = false;
    public $editModal = false;
    public $taskID;
    public $title;
    public $description;
    public $due;
    public $status;
    public $filter = 'all';


    // Makes sure Modal renders empty form
    public function add(){
        $this->taskID = '';
        $this->title = '';
        $this->description = '';
        $this->due = null;
        $this->addModal = true;
    }

    // Bind variables to Component and assign them to query result
    public function edit($id){
        $task = TaskModel::findOrFail($id);
        $this->taskID = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due = $task->due_date;
        $this->editModal = true;
    }

    // close all modals
    public function close(){
        $this->addModal = false;
        $this->editModal = false;
    }

    public function save(){

        $this->validate();

        $task = new TaskModel;
        $task->title = $this->title;
        $task->description = $this->description;
        $task->status = 'pending';
        $task->due_date = $this->due;
        $task->save();
        $this->addModal = false;
    }

    public function update()
    {
        $this->validate();

        $task = TaskModel::findOrFail($this->taskID);
        $task->title = $this->title;
        $task->description = $this->description;
        $task->due_date = $this->due;
        $task->save();
        $this->editModal = false;
    }

    public function markAsDone($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->status = 'completed';
        $task->save();
    }

    public function delete($id)
    {
        TaskModel::destroy($id);
    }

    // Using Laravel Livewire Computed to automatically refresh page for live changes
    #[Computed]
    public function tasks(){
        if ($this->filter === 'pending') {
            return TaskModel::pending()->latest()->get();
        } elseif ($this->filter === 'completed') {
            return TaskModel::completed()->latest()->get();
        }
        return TaskModel::latest()->get();
    }

    public function noFilter(){
        $this->filter = 'all';
    }
    public function pending(){
        $this->filter = 'pending';
    }
    public function completed(){
        $this->filter = 'completed';
    }

    public function render()
    {
        return view('livewire.task');
    }
}
