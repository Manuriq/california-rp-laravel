<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Compte;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Compte $compte)
    {
        $posts = Post::where('compte_id', $compte->id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        $messages = Message::where('compte_id', $compte->id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        return view('profile.show',[
            'compte' => $compte,
            'posts' => $posts,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compte $compte)
    {
        if($request->hasFile('cAvatar')){
            $path = $request->cAvatar->store('avatars');
            Auth()->user()->update(['cAvatarUrl'=>$path]);

            Session::flash('title', 'Félicitation !'); 
            Session::flash('message', 'Votre avatar a bien été modifié.'); 
            Session::flash('alert-class', 'success'); 
            
        }else{
            Session::flash('title', 'Erreur !'); 
            Session::flash('message', 'Vous devez d\'abord sélectionner une image en cliquant sur votre avatar.'); 
            Session::flash('alert-class', 'error'); 
        }

        return redirect()->back();
    }

    public function validateip()
    {
        /*$ip = $_SERVER['HTTP_CLIENT_IP'] 
            ? $_SERVER['HTTP_CLIENT_IP'] 
            : ($_SERVER['HTTP_X_FORWARDED_FOR'] 
                ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
                : $_SERVER['REMOTE_ADDR']);
 
            if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN'; 
            
         
        dd($ipaddress);  

        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];

        Auth()->user()->update([
            'cIp'=>$ip,
            'cIpUpdated' => 1
        ]);

        Session::flash('title', 'Félicitation !'); 
        Session::flash('message', 'Votre IP a bien été validée ! Veuillez patienter avant de vous connecter cela peut prendre 5 minutes maximum.'); 
        Session::flash('alert-class', 'success'); */     

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte)
    {
        //
    }
}
