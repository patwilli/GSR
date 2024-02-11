<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use App\Models\Fonctionnalite;
use App\Models\prod;
use App\Models\Remboursement;
use App\Models\Role;
use App\Models\User;

class rapportPretController extends Controller
{
    public function rapportEnCours()
    {
        $profil_user = Auth::user()->codeProfil;
        switch ($profil_user) {
            case 1:
                //ADMINISTRATEUR
                $credits = Credit::all();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');

                break;
            case 2:
                //CHEF AGENCE
                $credits = Credit::all();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');

                break;
            case 3:
                //CHEF BUREAU
                $bureau_user = Auth::user()->codeBureau;
                $mes_op = User::where('codeBureau', $bureau_user)->pluck('id');

                $credits = Credit::whereIn('codeAgent', $mes_op)->get();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');

                break;
            case 4:
                //OP
                $id_user = Auth::user()->id;

                $credits = Credit::where('codeAgent', $id_user)->get();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;

            default:
                return back();
                break;
        }
        return view('html/rapport-en-cours', compact('profil_user', 'credits', 'mes_fonctionnalites'));
    }
}
