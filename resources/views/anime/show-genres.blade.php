<x-layout title="Anime - ">
<x-navbar/>
<h1 class="title colour" >{{$title}}</h1>
<ul>
    @foreach($response as $genre)
<li><a href=" {{ route('anime.genres.id', $genre['mal_id'] ) }} ">{{ $genre['name'] }}</a></li>
    @endforeach
</ul>

</x-layout>