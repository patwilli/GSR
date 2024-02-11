<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Bureau;
use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function espaceAdmin()
    {
        $users = User::all();
        $profils = Profil::all();
        $nbr_users = $users->count();
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html/adminEspace', compact('profil_user', 'mes_fonctionnalites', 'users', 'nbr_users', 'profils'));
    }

    public function bloquerUtilisateur($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->bloque == 0) {
                $user->bloque = 1;
            } else {
                $user->bloque = 0;
            }
            $user->save();
            return response()->json([
                "success" => 'update bien'
            ]);
        }
    }
    public function changerUtilisateur($id, $selected)
    {
        $user = User::find($id);
        if ($user) {
            $user->codeProfil = $selected;
            $user->save();
            return response()->json([
                "success" => 'success'
            ]);
        }
    }
    public function rechercherUtilisateur($mot)
    {
        $users = User::where('name', 'LIKE', '%' . $mot . '%')->get();
        return response()->json($users);
    }
    public function trierUtilisateur($mot)
    {
        $users = User::where('codeProfil', $mot)->get();
        return response()->json($users);
    }

    public function recupABP($codeAgence, $codeBureau, $codeProfil)
    {
        $intituleAgence = Agence::find($codeAgence);
        $intituleAgence = $intituleAgence->intitule;
        $intituleBureau = Bureau::find($codeBureau);
        $intituleBureau = $intituleBureau->intitule;
        $intituleProfil = Profil::find($codeProfil);
        $intituleProfil = $intituleProfil->intitule;
        $data = [$intituleAgence, $intituleBureau, $intituleProfil];
        return response()->json($data);
    }

    public function listeProfil()
    {
        $listeProfil = Profil::all();
        return response()->json($listeProfil);
    }
}
