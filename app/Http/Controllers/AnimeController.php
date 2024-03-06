<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function index()
    {
        $title = 'Anime';
        $endpoint1 = 'https://api.jikan.moe/v4/genres/anime';
        $response = http::get($endpoint1);
        // dd($response['data']);
        return view('anime.show-genres',['response' => $response['data'], 'title' => $title]);
    }
    public function animeByGenre($id)
    {
        $endpoint2 = 'https://api.jikan.moe/v4/anime?genres/' . $id;
        $response = http::get($endpoint2);
        // dd($response['data']);
        return view('anime.show-single-genres',['response' => $response['data'], 'title' => 'Anime']);
    }

}
