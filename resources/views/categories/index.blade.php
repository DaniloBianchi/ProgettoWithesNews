<x-layout title="Categorie">
    <x-navbar/>

    <dic class="container">
        <div class="row">
            <div class="col-6 mx-auto text-center g-4">
            <h1>Categorie</h1>
            <a href="{{route('categories.create')}}" class="btn btn-primary">Crea nuova categoria</a>
            </div>
        </div>
        <div class="row mt-4">
            <x-session-succes/>
            <x-session-failed/>
            <div class="col-6 mx-auto">
                <table class="table table-bordered mt-3 ">
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Articoli correlati</th>
                        <th>Modifica</th>
                        <th>Cancella</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <ul>
                                @foreach($category->articles as $article)
                                    @if($article->user->id === $user_id)
                                    <li><a href="{{ route('articolo', $article) }}">{{ $article->title }} - {{ $article->user->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-end"><a href="{{ route('categories.edit',$category) }}" class="btn btn-warning ">Edit</a></td>
                        <td class="text-end">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </dic>
</x-layout>