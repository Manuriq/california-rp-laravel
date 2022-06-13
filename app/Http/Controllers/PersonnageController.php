<?php

namespace App\Http\Controllers;

use App\Models\Personnage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PersonnageController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $personnages = Personnage::where('ep_CompteID', Auth::User()->member_id)
                                    ->where('ep_Disponible', 0)
                                    ->get();

        return view('personnage.list', [
            'personnages' => $personnages,
        ]);
    }
    
    public function addtime(Personnage $personnage)
    {
        if(Auth::User()->shop >= 500){
            Auth::User()->shop -= 500;
            $personnage->ep_Temps += 2678400;
            Auth::User()->save();
            $personnage->save();
    
            Session::flash('title', 'Félicitation !'); 
            Session::flash('message', 'Vous venez d\'ajouter un mois de temps de jeu à votre personnage.'); 
            Session::flash('alert-class', 'success'); 
        }else{
            Session::flash('title', 'Erreur !'); 
            Session::flash('message', 'Vous n\'avez pas assez de point shop.'); 
            Session::flash('alert-class', 'error'); 
        }
        
            
        return redirect()->back();
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
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function show(Personnage $personnage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnage $personnage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnage $personnage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnage  $personnage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnage $personnage)
    {
        //
    }
}
