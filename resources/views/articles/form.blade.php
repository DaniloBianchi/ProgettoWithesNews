<x-layout title="{{$title}}">
    <x-navbar/>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center">{{$title}}</h1>
                <x-session-succes/>
                <a href="{{ route('articles.index') }}"> &laquo; Indietro </a>
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="border border-primary border-2 rounded-4 p-2 mt-2">
                    @csrf
                    @if($article->title)
                    @method('PUT')
                    @endif
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="title">Titolo</label>
                            <input type="text" id="title" value="{{ old('title', $article->title) }}" name="title" class="form-control @error('title') is-invalid @enderror border border-primary border-2 rounded-4">
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="categories">Categoria</label>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input type="checkbox"
                                        {{-- @checked($article->categories->contains($category->id)) --}}
                                        @checked(in_array($category->id, old('categories', $article->categories->pluck('id')->toArray())))
                                   name="categories[]"
                                   id="categories_{{$category->id}}"
                                   value="{{$category->id}}"
                                   class="form-check-input">
                                <label for="flexCheckDefault" class="form-check-label">{{ $category->name }}</label>
                            </div>
                                @endforeach
                                @error('categories') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="description">Descrizione</label>
                            <textarea name="description" id="description"rows="2" class="form-control @error('description') is-invalid @enderror border border-primary border-2 rounded-4">{{ old('description', $article->description) }}</textarea>
                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <label for="image">Inserisci immagine</label>
                            <input type="file" name="image" class="border border-primary border-2 rounded-4">
                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="body">Testo articolo</label>
                            <textarea name="body" id="body"rows="3"class="form-control border border-primary border-2 rounded-4">{{ old('body', $article->body) }}</textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success border border-primary border-2 rounded-4 ">Salva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>