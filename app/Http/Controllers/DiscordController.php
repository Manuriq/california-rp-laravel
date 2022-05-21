<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        Auth()->user()->update([
            'discord_id'=>$user->user->id,
            'discord_name'=>$user->user->username,
            'discord_disc'=>$user->user->discriminator,
            'discord_email'=>$user->user->email,
            'discord_verified'=>$user->user->verified
        ]);

        return redirect()->back();
    }
}