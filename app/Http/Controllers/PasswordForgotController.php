<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PasswordForgotController extends Controller
{
    public function formPassword()
    {
        return view('form-password-forgot');
    }

    public function mailPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $mail = $request->email;
        $password = uniqid();
        $user = User::where('email', $mail)->first();

        if ($user) {
            $user->password = Hash::make($password);
            $user->save();
        }

        try {
            Mail::to($mail)->send(new ForgotPasswordMail($user->name, $password));
            return redirect('/');
        } catch (\Exception $e) {
            return back()->with('msg', 'Vérifier votre connexion internet !');
        }
    }
}
