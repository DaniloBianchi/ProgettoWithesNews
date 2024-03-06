<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{
    public function home ()
    {
        $name = 'Danilo';
        $cognome = 'Bianchi';
        //per limitare il numero di caratteri di una stringa substr() 2°parametro è da dove iniziare, 3° par. quanti caratteri visualizza
        $title = 'Sono un titolo molto lungo e voglio essere abbreviato per essere visualizzato.';

        $subtitle = substr($title, 0, 12);

        return view('home', compact('title', 'subtitle', 'cognome', 'name'));
    }

    public function contatti()
    {
        $title = 'Pagina contatti';
        return view('contatti', ['title' => $title,]);
    }

    public function aboutUs()
    {
        $title = ' Ciao sono Danilo';
        $descrizione = 'sto passando i valori nella variabile $slot del componente layout ';
        return view('chi-sono', ['title'=> $title, 'descrizione'=> $descrizione]);
    }

    public function articoli()
    {

        // dd($this->articles); //dd()visualizza sul broswer
        $articles = Article::where('user_id', auth()->user()->id)->get();
        return view('articoli', ['articles' => $articles]);
    }

    public function articolo(Article $article)
    {
        if ($article->user_id != auth()->user()->id) {
            abort('403');
        }
        if(! $article->visible) {
            abort(404);
        }
        return view('articolo', compact('article'));
    }
}
