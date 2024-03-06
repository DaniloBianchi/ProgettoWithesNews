<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelfApiController extends Controller
{
    public function articles()
    {
        //$title = "Self Api";
        $articles=['Richiamo un API','Titolo 2','Titolo 3','Titolo 4'];
        return $articles;
    }
}
