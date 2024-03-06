
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">

         <a class="navbar-brand" href="#">
            {{--
            uso il metodo asset per richiamare un file nella cartella public
                --}}
            <img src="{{asset('images/Logo2.png')}}" alt="{{ config('app.name') }}" >
            {{ config('app.name') }}
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"     aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chi-sono') }}">Chi sono</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contatti') }}">Contatti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('anime.genres') }}">Anime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articoli') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('todo') }}">Todo</a>
                </li>
            </ul>
            @auth {{-- @auth -> if l'utente è autenticato --}}
                {{-- @guest -> if l'utente non è autenticato --}}
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item dropdown ms-auto">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Benvenuto <strong>{{ auth()->user()->email }}</strong>
                      </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-success"> {{-- dropdown-menu-end questa classe serve per allineare gli elementi del  droppdown dopo il click--}}
                            <li><a class="dropdown-item" href="{{ route('articles.index') }}">I tuoi articoli</a></li>
                            <li><a class="dropdown-item" href="{{route('categories.index')}}">Categorie</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="/logout" method="POST">
                             @csrf
                             <button type="submit" class="dropdown-item">Esci</button>
                            </form>
                        </ul>
                    </li>
                </ul>
            @else {{-- utente @guest--}}
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item dropdown ms-auto">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end"> {{-- dropdown-menu-end questa classe serve per allineare gli elementi del  droppdown dopo il click--}}
                         <li><a class="dropdown-item" href="/login">Accedi</a></li>
                          <li><a class="dropdown-item" href="/register">Registrati</a></li>
                      </ul>
                  </li>
             </ul>
            @endauth
    </div>
  </div>
</nav>