<x-layout title="Anime - ">
<x-navbar/>
<div class="container">
    <h1 class="title colour" >{{$title}} </h1>
    <div class="row">
        @foreach($response as $anime)
        <div class="col-md-3">
        <div class="card" style="width: 18rem; ">
            <img src="{{$anime['images']['jpg']['image_url']}}" class="card-img-top" alt="$anime['images']['jpg']['image_url']">
                <div class="card-body">
                    <h5 class="card-title">{{ $anime['title'] }}</h5>
                    <p class="card-text">{{ $anime['duration'] }}</p>
                   <p class="card-text" maxlength="20" required>{{ $anime['synopsis'] }}</p>
                  <p class="card-text">{{ $anime['score'] }}</p>
                </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

    @foreach($response as $anime)
        <div class="card" style="width: 18rem; ">
            <img src="{{$anime['images']['jpg']['image_url']}}" class="card-img-top" alt="$anime['images']['jpg']['image_url']">
                <div class="card-body">
                    <h5 class="card-title">{{ $anime['title'] }}</h5>
                    <p class="card-text">{{ $anime['duration'] }}</p>
                   <p class="card-text">{{ $anime['synopsis'] }}</p>
                  <p class="card-text">{{ $anime['score'] }}</p>
                </div>
        </div>

    @endforeach






</x-layout>