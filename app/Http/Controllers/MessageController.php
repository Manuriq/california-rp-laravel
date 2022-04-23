<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Message::class, 'message');
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
    public function create()
    {
        //
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
            'content' => ['required']
        ]);

        Message::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'compte_id' => Auth::User()->id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('forum.message.edit',
        [
            'message' => $message
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Models\Post  $post
     * @param  \App\Models\Message  $message
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Message $message, Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        $message->update([
          'content' => $request->content,
        ]);
        
        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre message a bien été edité.'); 
        Session::flash('alert-class', 'success'); 

        return redirect()->route('p.show', [$message->post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        Message::find($message->id)->delete();

        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre message a bien été supprimé.'); 
        Session::flash('alert-class', 'success'); 

        return redirect()->back();
    }
}
