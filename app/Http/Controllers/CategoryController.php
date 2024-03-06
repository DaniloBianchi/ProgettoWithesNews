<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id= auth()->user()->id;
        return view('categories.index',[ 'categories'=> Category::all(), 'user_id'=> $user_id ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title= 'Crea categoria';
        $route= route('categories.store');
        $category = new Category;
        return view('categories.form', compact('title', 'route', 'category', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->back()->with(['success'=>'Categoria creata correttamente.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $route = route('categories.update', $category);
        $title = 'Modifica categoria';
        return view('categories.form',compact('category', 'route', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('categories.index'))->with(['success'=>'Categoria modificata con successo.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->articles->count()){
            return redirect()->route('categories.index')->with(['failed' => 'La categoria non può cancellata perche esistono articoli con questa categoria']);
        } ;
        $category->delete();
        return redirect()->route('categories.index')->with(['success'=>'Categoria cancellata' ]);
    }
}
