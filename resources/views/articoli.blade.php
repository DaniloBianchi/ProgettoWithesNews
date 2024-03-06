<x-layout>
<x-navbar/>
{{-- NOTA: Questo è un commento in blade --}}


<div class="container mt-4 ">
    <div class="row ">
        <div class="col-12 text-center mb-3 fs-5">
            <h1>Articoli di oggi</h1>
        </div>
        <div class="row">
            @if($articles)
                @foreach($articles as $article)
                @if ($article->visible)
            <div class="col-3 text-center">
                <x-card-articles :route="route('articolo', $article)"
                                 :title="$article->title"
                                 :description="$article->description"
                                 :categories="$article->categories"
                                 :autor="$article->user->name"
                                 :image="Storage::url($article->image)"
                                 />

            </div>
                @endif
                @endforeach
                @else
                <h4>Oggi non ci sono articoli</h4>
                @endif
    </div>
</div>

        </div>

</x-layout>