<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;


class TaskForm extends Component
{
    use WithFileUploads;

    public $taskId = null;
    //  senza il medodo rules #[Validate('required|max:100')]   validatore con attributi si scrive sopra la variabile da validare
    #[Validate]
    public $taskName;

    //senza il medodo rules #[Validate('required|in:bassa,media,alta')]
    #[Validate]
    public $taskPrioryty = 'bassa';
    public $priorities= ['bassa', 'media', 'alta'];

    public $photo;

    // rules() parola chiave, si collega direttamente al validatore per andare a prendere le regole di validazione
    protected function rules()
    {
        return [
            'taskName'=> 'required|max:100',
            'taskPrioryty'=> 'required|in:bassa,media,alta',
        ];
    }
    //anche messages() si collega direttamente al validatore per andare a prendere li messaggi di output
    protected function messages()
    {
        return [
            'taskName.required'=> 'Il campo Task è obbligatorio',
        ];
    }

public function store()
{

    $this->validate(); //richiamo il validatore con attributi

    /*/$this->validate([
        'taskName'=> 'required|max:100',
        'taskPrioryty'=> 'required|in:bassa,media,alta',
        //se si scrive nell'html(ispeziona) si buca il validatore
    ]);*/
    if($this->taskId){
        $task = Task::find($this->taskId);
        $task->update([
            'name'=> $this->taskName,
            'priority'=> $this->taskPrioryty,
        ]);
            session()->flash('success', 'Task modificato correttamente!');
    }else{
        Task::create([
            'name'=> $this->taskName,
            'priority'=> $this->taskPrioryty,
        ]);
        if($this->photo){
            $this->photo->store('public/images');
        }else $this->photo = null;

        session()->flash('success', 'Task creato correttamente!');
        $this->resetForm();
        //lancio un evento alla creazione di ogni task
    }
    $this->dispatch('task-created');
}

public function resetForm()
{
    $this->taskId = null;
    $this->taskName = '';
    $this->taskPrioryty = 'bassa';
    $this->photo = null;
}

    #[On('task-edit')]
public function edit($taskId)
{
    $task= Task::find($taskId);
    $this->taskId = $task->id;
    $this->taskName = $task->name;
    $this->taskPrioryty = $task->priority;
}

    public function render()
    {
        return view('livewire.task-form');
    }
}
