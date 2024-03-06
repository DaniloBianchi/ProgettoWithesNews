<div>
    @if($taskId)
    <h3>Modifica task</h3>
    @else
    <h3>Crea nuovo task</h3>
    @endif
    <x-session-succes />

    <form wire:submit.prevent='store'>
        <div class="row g-3">

            <div class="col-12">
                <label for="name">Task</label>
                <input type="text" value="" id="name" class="form-control" wire:model.blur="taskName">
                {{--
                     .live serve per la validazione real time,  fa molte richieste al server
                    .blur valida quando ci si sposta su un altro elemento della pagina
                    .live.debounce.5000ms fa la validazione dopo 5 secondi dall'ultima digitazione
                    funzionano solo per la validazione con attributi #[Validate()]
                    --}}
                @error('taskName') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                
                <label>Immagine</label>
                <input type="file"  name="photo" class="form-control" wire:model="photo">
                @error('photo') <span class="text-danger small">{{ $message }}</span> @enderror

                @if($photo)
                    <img class="img-fluid" src="{{ $photo->temporaryUrl() }}"> {{-- visualizza anteprima foto--}}
                @endif
            </div>
            <div class="col-12">
                <label for="priority">Priorità</label>
                <select name="taskPriority" id="priority" class="form-control" wire:model='taskPrioryty'>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
                     {{-- ucfirst() serve per rendere la prima lettera maiuscola --}}
                    @endforeach
                </select>
                @error('taskPriority') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                @if ($taskId)
                <button type="submit" class="btn btn-primary">Modifica</button>

                @else
                <button type="submit" class="btn btn-primary">Crea</button>
                @endif
            </div>

        </div>
    </form>
        @if ($taskId)
            <div class="mt-2">
                <button type="submit" class="btn btn-secondary " wire:click='resetForm'>Crea</button>
            </div>
        @endif
</div>
