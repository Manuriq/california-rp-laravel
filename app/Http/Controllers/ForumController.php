<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum.forum.index', [
            'forums' => Forum::orderBy('order', 'ASC')
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
        return view('forum.forum.create', [
            'categories' => Categorie::orderBy('order', 'ASC')
                        ->get()
        ]);
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
            'desc' => ['string', 'max:150'],
            'order' => ['integer', 'required', 'min:1'],
            'categorie' => ['integer', 'required', 'min:1'],
            'state' => ['integer', 'required', 'min:0', 'max:1']
        ]);

        $categorie = Categorie::findOrFail($request->categorie);

        $forum = Forum::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'order' => $request->order,
            'state' => $request->state,
            'categorie_id' => $categorie->id
        ]);
        
        $forum->save();

        Session::flash('title', 'Félicitation !');
        Session::flash('message', 'Ajout d\'un nouveau forum avec succes !');
        Session::flash('alert-class', 'success');
        
        return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {

        $posts = Post::where('forum_id', $forum->id)
        ->orderBy('updated_at', 'DESC')
        ->paginate(10);

        return view('forum.forum.show', [
            'forum' => $forum,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        $categories = Categorie::orderBy('order', 'ASC')->get();
        return view('forum.forum.edit', [
            'forum' => $forum,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'desc' => ['string', 'max:150'],
            'order' => ['integer', 'required', 'min:1'],
            'categorie' => ['integer', 'required', 'min:1'],
            'state' => ['integer', 'required', 'min:0', 'max:1']
        ]);

        $categorie = Categorie::findOrFail($request->categorie);

        $forum->update([
          'title' => $request->title,
          'desc' => $request->desc,
          'order' => $request->order,
          'categorie' => $request->categorie,
          'state' => $request->state,
        ]);
        
        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre Fotum a bien été edité.'); 
        Session::flash('alert-class', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        Forum::find($forum->id)->delete();

        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre forum a bien été supprimé.'); 
        Session::flash('alert-class', 'success'); 

        return redirect()->back();
    }
}
