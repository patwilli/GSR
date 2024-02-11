<?php

namespace App\Http\Controllers;

use App\Models\Fonctionnalite;
use App\Models\Profil;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilsFonctionnalitesController extends Controller
{
    public function profils_fonctionnalites()
    {
        $profils = Profil::all();
        $fonctionnalites = Fonctionnalite::all();
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html/profils_fonctionnalites', compact('profil_user', 'mes_fonctionnalites', 'profils', 'fonctionnalites'));
    }

    public function rechercheFonc($idProfil)
    {
        $listes_fonc = Role::where('codeProfil', $idProfil)->get();
        return response()->json($listes_fonc);
    }
    public function updateFonc($idProfil, $idFonc)
    {
        $la_fonc = Role::where('codeProfil', $idProfil)
            ->where('codeFonctionnalite', $idFonc)->first();

        if ($la_fonc) {
            $la_fonc->delete();
        } else {
            $la_fonc = Role::firstOrCreate([
                'codeProfil' => $idProfil,
                'codeFonctionnalite' => $idFonc,
            ]);
        }

        return response()->json();
    }
}
