<x-layout title="Modifica articolo ">
    <x-navbar/>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center">Modifica articolo</h1>
                <x-session-succes/>
                <a href="{{ route('articolo', $article) }}"> << Indietro </a>
                <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="border border-primary border-2 rounded-4 p-2 mt-2">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="title">Titolo</label>
                            <input type="text" id="title" value="{{ $article->title }}" name="title" class="form-control @error('title') is-invalid @enderror border border-primary border-2 rounded-4">
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="category_id">Categoria</label>
                            <select class="form-control @error('category_id') is-invalid @enderror border border-primary border-2 rounded-4" name="category_id" id="category_id">
                                <option value=""><a href=""></a></option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                @endforeach
                            </select><a class="btn btn-primary p-0 ps-1 pe-1 mt-1" href="{{route('categories.create')}}">Crea nuova</a>
                        </div>
                        <div class="col-12">
                            <label for="description">Descrizione</label>
                            <textarea name="description" id="description"rows="2" class="form-control @error('description') is-invalid @enderror border border-primary border-2 rounded-4">{{ $article->category }}</textarea>
                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="image">Inserisci immagine</label>
                            <input type="file" name="image" class="border border-primary border-2 rounded-4">
                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="body">Testo articolo</label>
                            <textarea name="body" id="body"rows="3"class="form-control border border-primary border-2 rounded-4">{{ $article->body }}</textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-success border border-primary border-2 rounded-4 ">Salva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>