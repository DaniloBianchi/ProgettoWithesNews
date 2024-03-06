<x-layout title="Crea">
<x-navbar/>
<div class="container mt-3">
    <div class="row ">
        <x-session-succes/>
        <a href="{{ route('categories.index') }}">&laquo; Indietro </a>
        <div class="col-4 mx-auto mt-5">
            <div class="card mt-5">

                <div class="card-header">
                    Crea categoria

                </div>
                <div class="card-body ">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name">Nome</label>
                                <input type="text" name ="name" id="name" value="{{ old('name')}}" class="form-control" maxlength="50">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary">Crea</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>