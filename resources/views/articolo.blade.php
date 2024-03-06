<x-layout title="{{'Categorie' . ' ' }}">
<x-navbar/>

<div class="container">
    <div class="row">
          <a href="{{ route('articoli') }}">&laquo; Indietro </a>
          <x-session-succes/>

        <div class="card" style="width: 18rem; ">
            <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">
              @foreach($article->categories as $category)
                {{$category->name}} -
              @endforeach
            </p>
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->description }}</p>
            <p class="card-text">{{ $article->body }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

</x-layout>
