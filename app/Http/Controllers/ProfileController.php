<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html.mon-profil', compact('profil_user', 'mes_fonctionnalites'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('monProfil')->with('notif', 'Mot de passe mis à jour avec succès.');
        }

        return redirect()->route('monProfil')->with('notif', 'Le mot de passe actuel est incorrect.');
    }
}
