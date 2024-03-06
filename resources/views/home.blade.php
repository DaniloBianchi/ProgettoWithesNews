<x-layout title="Homepage - ">
<x-navbar/>
<div class="container">
    <div class="row">
        <div class="col-12 text-center mx-auto">
            <h1 class="title colour" >{{ config('app.name') }}</h1>

            <h2>{{ $title }}</h2>
            <h2>{{ $subtitle }}</h2>
            {{--
                posso abbreviare il testo nel controller o direttamente nell'Html:
                <h2>{{ substr($title, 0, 12) }}</h2>
                --}}
        </div>

        <div class="mb-5">
            <livewire:counter>
                componente livewire
        </div>
        <div class="mt-5">
            <ul id="articles"></ul>
        </div>
    </div>
    <div class="row mt-5">

        <div class=" col-6 mb-5">
            componente livewire
            <livewire:search-articles>
        </div>
    </div>
</div>

<script>
         const articles = document.getElementById('articles');
    fetch('http://127.0.0.1:8000/api/articoli')
    .then(response => response.json())
    .then(data => {
                for(let item of data) {
                    articles.innerHTML += '<li>' + item + '</li>';
                }
            })
    .cach()


</script>
</x-layout>
