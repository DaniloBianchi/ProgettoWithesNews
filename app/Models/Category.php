<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//non aggiungo il name space di Category perche è uguale a quello di Article


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name',];

    //creo la rezione 1 a molti, un articolo puo avere piu categorie
public function articles()
{
    //relazione molti a 1
    //return $this->hasMany(Article::class);

    //Relazione molti a molti
    return $this->belongsToMany(Article::class);
}
}
