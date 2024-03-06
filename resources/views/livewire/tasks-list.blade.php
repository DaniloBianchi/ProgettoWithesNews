<div>
    <h4>Elenco task</h4>

    <div class="mt-3">
        @foreach ($tasks as $task)
            <div class="card mb-2 ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-8 ">
                            <h5>{{ $task->name }}</h5>
                            <div >
                                @if ($task->priority == 'alta')
                                <span class="text-danger fw-bold">{{ $task->priority }}</span>
                                @elseif($task->priority == 'media')
                                <span class="text-warning fw-bold">{{ $task->priority }}</span>
                                @else
                                <span class="text-success fw-bold">{{ $task->priority }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            @if (!$task->completed)
                            <button class="btn btn-sm text-warning" wire:click='completed({{ $task->id }})'>Da completare</button>
                            @else
                            <button class="btn btn-sm text-success" wire:click='completed({{ $task->id }})'>Completato</button>
                            @endif
                        </div>
                        <div class="col-md-2 text-end">
                            <button class="btn btn-sm" wire:click='edit({{ $task->id }})'>Modifica</button>
                            <button class="btn btn-sm text-danger" wire:click='delete({{ $task->id }})'>Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
