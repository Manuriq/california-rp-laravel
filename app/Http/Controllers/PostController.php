<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use App\Models\Message;
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
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => ['required']
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'forum_id' => $forum->id,
            'compte_id' => Auth::User()->id
        ]);

        $messages = Message::where('post_id', $post->id)
        ->orderBy('created_at', 'ASC')
        ->paginate(10);

        return view('forum.post.show', [
            'post' => $post,
            'messages' => $messages
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
        $messages = Message::where('post_id', $post->id)
            ->orderBy('created_at', 'ASC')
            ->paginate(10);

        return view('forum.post.show', [
            'post' => $post,
            'forum' => $forum,
            'messages' => $messages
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
