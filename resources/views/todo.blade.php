<x-layout title="Todo list">
    <x-navbar />

    <div class="container mt-5">
        <h1>Todo list</h1>

        <div class="row mt-5">
            <div class="col-lg-3">
                <livewire:task-form />
            </div>
            <div class="col-lg-9">
                <livewire:tasks-list />
            </div>

        </div>
    </div>
</x-layout>
