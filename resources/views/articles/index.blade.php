<x-layout title="Gestione articoli">
    <x-navbar />
<div class="container">
    <div class="row mt-4">
        <h3>I miei articoli</h3>

            <x-session-succes/>
            <div class="col-12 mt-3">
            <a class="btn btn-primary" href="{{route('form.create')}}">Crea un articolo</a>
            <table class="table table-bordered mt-3 text-center ">
                <thead>
                    <tr>
                         <th>#</th>
                         <th>Titolo</th>
                         <th>Autore</th>
                         <th>Categorie</th>
                         <th></th>
                         <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>

                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>
                        <ul>
                          @foreach($article->categories as $category)
                            <li>{{$category->name}}</li>
                          @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{route('articles.edit', $article)}}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button href="{{route('articles.edit', $article)}}" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>