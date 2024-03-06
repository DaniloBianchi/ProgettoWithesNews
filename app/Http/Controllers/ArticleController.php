<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;


class ArticleController extends Controller
{


    public function storeDatabase(Request $request)
    {
      /* 1 Metodo per creare un nuovo record nella tabella articoli */

        /*
          $article = new Article();

          $article->title = 'Perché PHP è migliore di JS';
          $article->category = 'Programmazione';
          $article->description = '...';
          $article->body = 'Qui c\'è un testo molto lungo';
          $article->visible = true;

          $article->save();  si seve sempre fare il save()
        */
         /* 2 Metodo per creare un nuovo record nella tabella articoli */

         Article::create([
            'title' => 'JS è migliore di PHP',
            'category' => 'Programmazione',
            'description' => '...',
            'body' => 'Qui c\'è un testo molto lungo',
            'visible' => true,
        ]);

        // Article::create($request->all());
    }
    public function index()
      {
        $articles = Article::where('user_id', auth()->user()->id)->get();
        return view('articles.index', ['articles' => $articles]);
      }
    public function show()
      {

      }
    public function create(Article $article)
    {
      $categories = Category::all();
      $route= route('form.store');
      $title = 'Crea articolo';
      return view('articles.form', compact('title', 'categories', 'article', 'route'));
    }
    public function store(StoreArticleRequest $request)
    {
      //  dd($request->all());
      //dd($request->categories);
      $article = Article::create($request->all());
      $article->categories()->attach($request->categories);
      $article->user_id = auth()->user()->id;

      if($request->hasFile('image') && $request->file('image')->isValid()){
        $fileName = 'copertina.' . $request->file('image')->extension();
        $article->image = $request->file('image')->storeAs('public/articles/' . $article->id, $fileName);
      }
      $article->save();
      return redirect()->back()->with(['success'=> 'Articolo creato correttamente']);
    }

    public function edit(Article $article, Category $category)
    {
      //verifico quale user sta modificando
      if($article->user_id != auth()->user()->id){
        abort('403');
      }
        $title= 'Modifica articolo';
        $route = route('articles.update', $article);
        return view('articles.form',['title'=>$title, 'article' => $article,'route'=>$route, 'categories'=> Category::all() ]);
    }

    public function update(StoreArticleRequest $request, Article $article)
    {
    if ($article->user_id != auth()->user()->id) {
      abort('403');
    }
        $article->update($request->all());

        $article->categories()->detach(); // Rimuove tutte le categorie collegate al corrente articolo
        // $article->categories()->detach($id = 1); // Rimuove solo la categoria con id = 1 collegata
        // $article->categories()->detach($array); // Rimuove le categorie contenute nell'array collegata
        $article->categories()->attach($request->categories);

        if($request->hasFile('image') && $request->file('image')->isValid()){
        $fileName = 'copertina.' . $request->file('image')->extension();
        $article->image = $request->file('image')->storeAs('public/articles/' . $article->id, $fileName);
      }
        $article->save();
        return redirect(route('articles.index'))->with(['success'=>'Articolo modificato con successo.']);
    }
    public function destroy(Article $article)
    {
    if ($article->user_id != auth()->user()->id) {
      abort('403');
    }
        $article->categories()->detach();
        $article->delete();
        return redirect()->back()->with(['success'=>'Articolo cancellato' ]);
    }
}
