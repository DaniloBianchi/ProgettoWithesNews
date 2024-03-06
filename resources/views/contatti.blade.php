<x-layout title="Contact us - ">
<x-navbar/>

<div class="container">
    <div class="row ">
        <div class="col-md-6 mt-3 mx-auto">
            <div  class="text-center">
                <h1>Contact us</h1>
                <p>Invia una mail all'amministratore</p>
            </div>
               <x-session-succes/>
               <x-session-failed/>
            <form action="{{ route('contatti.send') }}" method="POST" class="border border-warning border-2 rounded-4 p-2">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label ">Nome</label>
                    <input type="text" name="name" class="form-control border border-warning border-2 rounded-4" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" name="email" class="form-control border border-warning border-2 rounded-4" id="email">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="message">Messaggio</label>
                    <textarea class="form-control" name="message" id="message" rows="6"></textarea>
                </div>
                <button type="submit" class="btn btn-success border border-warning border-2 rounded-4">Invia messaggio</button>
            </form>
        </div>
    </div>
</div>

</x-layout>