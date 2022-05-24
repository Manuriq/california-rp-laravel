<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function list()
    {
        $comptes = Compte::paginate(20);

        return view('compte.list', [
            'comptes' => $comptes,
        ]);
    }

    public function search(Request $request)
    {    
        $comptes = Compte::query()
            ->where('cNom', 'LIKE','%'.$request->search.'%')
            ->orWhere('cEmail', 'LIKE','%'.$request->search.'%')
            ->orWhere('discord_name', 'LIKE','%'.$request->search.'%')
            ->orWhere('discord_id', 'LIKE','%'.$request->search.'%')
            ->paginate(20);
        
        return view('compte.list', [
            'comptes' => $comptes,
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {
        return view('compte.edit', [
            'compte' => $compte
        ]);
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
        $request->validate([
            'whitelisted' => ['required']
        ]);

        $compte->update([
            'whitelisted' => $request->whitelisted,
            'beta' => $request->beta
          ]);

        Session::flash('title', 'Félicitation !');
        Session::flash('message', 'Vous venez d\'éditer le compte avec succes !');
        Session::flash('alert-class', 'success');

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
