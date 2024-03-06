<div>

    <div class="container">
        <div class="row">
            <div class="col-6">
             <label for="search">Cerca</label>
            <input wire:model.live="search" />
            </div>

            <div class="col-6">
                <table class="table mt-3 text-center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
