<x-layout>
    <x-navbar/>

<div class="container mt-5">
    <h1>Benvenuto {{ auth()->user()->name }}</h1>
    {{-- Se provate a raggiungere questa vista e non siete autenticati è normale se vi restituisce un errore --}}

</div>
</x-layout>