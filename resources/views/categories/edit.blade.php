<x-layout title="{{$title}}">
<x-navbar/>
<div class="container mt-3">
    <div class="row ">
        <x-session-succes/>
        <a href="{{ route('categories.index') }}">&laquo; Indietro </a>
        <div class="col-4 mx-auto mt-5">
            <div class="card mt-5">
                <div class="card-header">
                    {{$title}}
                </div>
                <div class="card-body ">
                    <form action="{{ $route }}" method="POST">
                        @csrf
                        @if($categories->id)
                        @method('PUT')
                        @endif
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name">Nome</label>
                                <input type="text" name ="name" id="name" value="{{ old('name', $category->name) }}" class="form-control" maxlength="50">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary">Salva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>