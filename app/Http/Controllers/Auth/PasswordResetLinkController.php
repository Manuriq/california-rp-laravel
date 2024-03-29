<?php

namespace App\Http\Controllers\Auth;

use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $token = Str::random(60);
        $passwordReset = PasswordReset::firstOrCreate(
            ['email' => $request->email],
            ['email' => $request->email, 'token' => $token]
        );

        Mail::to($request->email)->send(new ResetPassword($passwordReset->token, $passwordReset->email));

        Session::flash('message', 'Un email a été envoyé à l\'adresse indiquée. Vérifiez vos spam.');

        return redirect()->back();
    }
}
