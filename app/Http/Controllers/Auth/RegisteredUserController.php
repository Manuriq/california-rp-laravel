<?php

namespace App\Http\Controllers\Auth;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'cNom' => ['required', 'string', 'max:255', 'unique:comptes'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:comptes'],
            'password' => ['required', 'string', 'min:6'],
            'repeat_password' => 'required|same:password|min:6'
        ]);
        $compte = Compte::create([
            'cNom' => $request->cNom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ]);

        event(new Registered($compte));

        Auth::login($compte);

        return redirect(RouteServiceProvider::HOME);
    }

}
