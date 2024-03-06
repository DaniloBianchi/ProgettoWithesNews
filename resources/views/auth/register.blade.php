<x-layout title="Registrati">
<x-navbar/>
<div class="container">
    <div class="row ">
        <div class="col-4 mx-auto mt-2">
            <div class="card mt-5">
                <div class="card-header">
                    Registrati
                </div>
                <div class="card-body ">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email">Nome</label>
                                <input type="name" name ="name" id="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" name ="email" id="email" class="form-control" value="{{ old('email') }}">
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" name ="password" id="password" class="form-control">
                                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation">Conferma password</label>
                                <input type="password" name ="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary">Registrati</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>