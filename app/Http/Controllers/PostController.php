<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum)
    {
        if($forum->state == 1){
            return redirect()->back();
        }

        return view('forum.post.create', [
            'forum' => $forum
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Request $request)
    {
        if($forum->state == 1){
            
            Session::flash('title', 'Erreur !'); 
            Session::flash('message', 'Le forum est fermé, vous ne pouvez pas créer de nouveau sujet.'); 
            Session::flash('alert-class', 'error'); 

            return redirect()->route('f.show', [$forum]);
        }

        $request->validate([
            'title' => 'required',
            'content' => ['required']
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'forum_id' => $forum->id,
            'compte_id' => Auth::User()->id
        ]);

        return redirect()->route('p.show', [$post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $messages = Message::where('post_id', $post->id)
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        return view('forum.post.show', [
            'post' => $post,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('forum.post.edit',
        [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => ['required']
        ]);

        $post->update([
          'content' => $request->content,
        ]);
        
        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre sujet a bien été edité.'); 
        Session::flash('alert-class', 'success');

        return redirect()->route('p.show', [$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::find($post->id)->delete();

        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre sujet a bien été supprimé.'); 
        Session::flash('alert-class', 'success'); 

        return redirect()->route('f.show', [$post->forum->id]);
    }
}
