<x-layout title="Chi sono - ">
<x-navbar/>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 text-center">
            <h1>{{$title}}</h1>
            <p>{{$descrizione}}</p>
        </div>
    </div>
</div>

<div>
    <livewire:search-users>
</div>
</x-layout>
