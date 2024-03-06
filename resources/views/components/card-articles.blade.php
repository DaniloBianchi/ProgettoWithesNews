<div class="card" style="width: 18rem; ">
  <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">Autore: {{ $autor }}</p>
        
        <p class="card-text">Categoria:
           @foreach($categories as $category)
           {{$category->name}}
           @endforeach
        </p>
        <h5 class="card-title">Titolo: {{ $title }}</h5>
        <p class="card-text">Descrizione: {{ $description }}</p>
        <a class="btn btn-primary" href="{{ $route }}">Apri</a>
    </div>
</div>