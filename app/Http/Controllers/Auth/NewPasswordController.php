<?php

namespace App\Http\Controllers\Auth;

use App\Models\Compte;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Session;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => 'required|same:password|min:6'
        ]);

        $reset = DB::table('password_resets')->where('token', $request->token)->first();

        if($reset->email = $request->email){

            $compte = Compte::where('email', $request->email);
            $compte->update([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ]); 

            return redirect()->route('login');
        }else{
            Session::flash('message', 'Le token est invalide ou expiré, veuillez refaire une demande de ré-initialisation.');          
        }

        return redirect()->back();
    }
}
