<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('order', 'ASC')->get();

        $forums = Forum::orderBy('order', 'ASC')->get();

        return view('forum.categorie.index', [
            'categories' => $categories,
            'forums' => $forums
        ]);
    }

    public function list()
    {
        return view('forum.categorie.list', [
            'categories' => Categorie::orderBy('order', 'ASC')
                        ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'order' => ['integer', 'required', 'min:1'],
        ]);

        $categorie = Categorie::create([
            'title' => $request->title,
            'order' => $request->order
        ]);
        
        $categorie->save();

        Session::flash('title', 'Félicitation !');
        Session::flash('message', 'Ajout d\'une nouvelle catégorie avec succes !');
        Session::flash('alert-class', 'success');
        
        return redirect()->route('categorie.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view('forum.categorie.edit', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'order' => ['integer', 'required', 'min:1'],
        ]);

        $categorie->update([
            'title' => $request->title,
            'order' => $request->order,
          ]);

        Session::flash('title', 'Félicitation !');
        Session::flash('message', 'Vous venez d\'éditer votre catégorie avec succes !');
        Session::flash('alert-class', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        Categorie::find($categorie->id)->delete();

        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre Catégorie a bien été supprimé.'); 
        Session::flash('alert-class', 'success'); 

        return redirect()->back();
    }
}
