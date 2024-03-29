<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('discord')->user();

        if(!$user){
            Session::flash('title', 'Erreur !'); 
            Session::flash('message', 'Une erreur est survenue, veuillez re-essayer.'); 
            Session::flash('alert-class', 'error');
        }else{
            $compte = User::where('discord_id', $user->id)->first();

            if($compte != null && $compte->id != Auth()->user()->id){
    
                Session::flash('title', 'Erreur !'); 
                Session::flash('message', 'Ce compte discord est déjà lié à un compte SFRP.'); 
                Session::flash('alert-class', 'error');
    
            }else{
                Auth()->user()->update([
                    'discord_id'=>$user->id,
                    'discord_name'=>$user->user['username'],
                    'discord_disc'=>$user->user['discriminator'],
                    'discord_email'=>$user->user['email'],
                    'discord_verified'=>$user->user['verified']
                ]);
              
                Session::flash('title', 'Félicitation !'); 
                Session::flash('message', 'Vous venez de synchroniser votre compte Discord.'); 
                Session::flash('alert-class', 'success'); 
            }
        }

        return redirect()->route('dashboard');
    }
}