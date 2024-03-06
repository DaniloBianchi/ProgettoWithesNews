<div>
    <div>

        <div class="container">
            <div class="row">
                    <div class="col-12">
                        <label for="search">Cerca titolo: </label>
                        <input wire:model.live="search" />
                    </div>


                <div class="col-12">
                    <table class="table mt-3 text-center">
                        <thead>
                            <tr>
                                <th>Titolo</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{$article->title}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
