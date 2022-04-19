<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store($forumid, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => ['required']
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'forum_id' => $forumid,
            'compte_id' => Auth::User()->id
        ]);

        $forum = Forum::find($request->forumId);

        return view('forum.post.show', [
            'post' => $post,
            'forum' => $forum
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Post $post)
    {

        return view('forum.post.show', [
            'post' => $post,
            'forum' => $forum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
