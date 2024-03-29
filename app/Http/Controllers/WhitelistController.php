<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WhitelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whitelist = Whitelist::where('member_id', Auth::User()->member_id)->first();

        return view('whitelist.index', [
            'whitelist' => $whitelist,
        ]);
    }

    public function list()
    {
        if(Auth::User()->ingame_adminrank < 1){
            return redirect()->route('dashboard');
        }


        $whitelists = Whitelist::where('statut', "=", 1)
            ->orderBy('updated_at', 'DESC')
            ->get();

        $users = User::all();

        return view('whitelist.list', [
            'whitelists' => $whitelists,
            'users' => $users
        ]);
    }

    public function search(Request $request)
    {    

        $whitelists = Whitelist::where('statut', "=", $request->statut)
            ->orderBy('updated_at', 'DESC')
            ->get();
        
        $users = User::query()
            ->where('name', 'LIKE','%'.$request->search.'%')
            ->orWhere('email', 'LIKE','%'.$request->search.'%')
            ->orWhere('discord_name', 'LIKE','%'.$request->search.'%')
            ->orWhere('discord_id', 'LIKE','%'.$request->search.'%')
            ->orWhere('discord_email', 'LIKE','%'.$request->search.'%')
            ->get();
        
        return view('whitelist.list', [
            'whitelists' => $whitelists,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $whitelist = Whitelist::firstOrCreate(
            ['member_id' => Auth::User()->member_id]
        );

        if($whitelist->tryout > 2 || $whitelist->statut == 1 || $whitelist->statut == 2)
        {
            return view('whitelist.index', [
                'whitelist' => $whitelist,
            ]);
        }
        
        return view('whitelist.update', [
            'whitelist' => $whitelist
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whitelist  $whitelist
     * @return \Illuminate\Http\Response
     */
    public function show(Whitelist $whitelist)
    {
        if(Auth::User()->ingame_adminrank < 1){
            return redirect()->route('dashboard');
        }

        $user = User::where('member_id', $whitelist->member_id)->first();

        return view('whitelist.show', [
            'whitelist' => $whitelist,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whitelist  $whitelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Whitelist $whitelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whitelist  $whitelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whitelist $whitelist)
    {
        if($whitelist->tryout > 2 || $whitelist->statut == 1 || $whitelist->statut == 2)
        {
            return view('whitelist.index', [
                'whitelist' => $whitelist,
            ]);
        }

        $whitelist->update([
            'res_a' => $request->res_a,
            'res_b' => $request->res_b,
            'res_c' => $request->res_c,
            'res_d' => $request->res_d,
            'res_e' => $request->res_e,
            'res_f' => $request->res_f,
            'statut' => 1,
            'tryout' => $whitelist->tryout+1
          ]);
          
          Session::flash('title', 'Félicitation !'); 
          Session::flash('message', 'Votre questionnaire whitelist a bien été envoyé.'); 
          Session::flash('alert-class', 'success');

          return view('whitelist.index', [
            'whitelist' => $whitelist,
        ]);
    }

    public function admin(Request $request, Whitelist $whitelist)
    {
        if(Auth::User()->ingame_adminrank < 1){
            return redirect()->route('dashboard');
        }

        if($whitelist->statut != 1 && Auth::User()->ingame_adminrank != 6){
            return redirect()->route('whitelist.list');
        }

        $whitelist->update([
            'statut' => $request->statut,
            'comment' => $request->comment,
            'admin' => Auth::User()->name
          ]);
          
          Session::flash('title', 'Félicitation !'); 
          Session::flash('message', 'Votre questionnaire whitelist a bien été envoyé.'); 
          Session::flash('alert-class', 'success');

          return redirect()->route('whitelist.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whitelist  $whitelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whitelist $whitelist)
    {
        //
    }
}
