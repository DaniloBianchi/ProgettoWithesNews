<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//non aggiungo il name space di Category perche è uguale a quello di Article
class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'body','image'];

    //creo la rezione 1 a molti, un articolo puo avere piu categorie
    public function categories()
    {
        //relazione 1 a molti
        //return $this->belongsTo(Category::class);

        //relazione molti a molti
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function search($search)
    {
        return self::where('title', 'LIKE', "%$search%")->get();
    }
}
