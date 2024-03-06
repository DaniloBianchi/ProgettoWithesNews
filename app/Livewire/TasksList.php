<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class TasksList extends Component
{
    public $tasks = [];

    // mount() nome specifico
    public function mount()
    {
       $this->loadTasks();
    }

    //catturo l'evento creato nel TaskForm per caricare il task senza riaggiornare la pagina
    #[On('task-created',)]
    public function loadTasks()
    {
        //$this->tasks = Task::all();  //fa comparire tutti i task

        $this->tasks = Task::orderBy('completed', 'ASC')->orderBy('id', 'DESC',)->get();  // fa comparire tutti i task in ordine di creazione
        // il metodo orderBy() può essere chiamato più volte nella singola query

    }

    public function edit($taskId)
    {
        $this->dispatch('task-edit', $taskId);
    }
    
    public function delete($taskId)
    {
        $task = Task::find($taskId);
        $task->delete();
        $this->loadTasks();
    }

    public function completed($taskId)
    {
        $task = Task::find($taskId);

        if(!$task->completed){
            $task->completed = true;
        }else{
            $task->completed = false;
        }
        $task->save();
        $this->loadTasks();

    }

    public function render()
    {
        return view('livewire.tasks-list');
    }
}
