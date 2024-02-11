<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use App\Models\Fonctionnalite;
use App\Models\message;
use App\Models\prod;
use App\Models\Remboursement;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class LinkController extends Controller
{
    public function form()
    {
        return view('formulaire-connexion');
    }

    public function index()
    {
        $profil_user = Auth::user()->codeProfil;
        switch ($profil_user) {
            case 1:
                //ADMINISTRATEUR
                $nbr_credit_dispo = Credit::all();
                $nbr_credit_dispo = $nbr_credit_dispo->count();

                $nbr_credit_saint = Credit::where('etatCredit', 'SAINT')->get();
                $nbr_credit_saint = $nbr_credit_saint->count();

                $nbr_credit_contentieux = Credit::where('etatCredit', 'CONTENTIEUX')->get();
                $nbr_credit_contentieux = $nbr_credit_contentieux->count();

                $nbr_credit_immobilises = Credit::where('etatCredit', 'IMMOBILISE')->get();
                $nbr_credit_immobilises = $nbr_credit_immobilises->count();

                $credits = Credit::all()->take(5);

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 2:
                //CHEF AGENCE
                $nbr_credit_dispo = Credit::all();
                $nbr_credit_dispo = $nbr_credit_dispo->count();

                $nbr_credit_saint = Credit::where('etatCredit', 'SAINT')->get();
                $nbr_credit_saint = $nbr_credit_saint->count();

                $nbr_credit_contentieux = Credit::where('etatCredit', 'CONTENTIEUX')->get();
                $nbr_credit_contentieux = $nbr_credit_contentieux->count();

                $nbr_credit_immobilises = Credit::where('etatCredit', 'IMMOBILISE')->get();
                $nbr_credit_immobilises = $nbr_credit_immobilises->count();

                $credits = Credit::all()->take(5);

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 3:
                //CHEF BUREAU
                $bureau_user = Auth::user()->codeBureau;
                $mes_op = User::where('codeBureau', $bureau_user)->where('codeProfil', 4)->pluck('id');

                $nbr_credit_dispo = Credit::whereIn('codeAgent', $mes_op);
                $nbr_credit_dispo = $nbr_credit_dispo->count();

                $nbr_credit_saint = Credit::where('etatCredit', 'SAINT')->whereIn('codeAgent', $mes_op);
                $nbr_credit_saint = $nbr_credit_saint->count();

                $nbr_credit_contentieux = Credit::where('etatCredit', 'CONTENTIEUX')->whereIn('codeAgent', $mes_op);
                $nbr_credit_contentieux = $nbr_credit_contentieux->count();

                $nbr_credit_immobilises = Credit::where('etatCredit', 'IMMOBILISE')->whereIn('codeAgent', $mes_op);
                $nbr_credit_immobilises = $nbr_credit_immobilises->count();

                $credits = Credit::whereIn('codeAgent', $mes_op)->take(5)->get();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 4:
                //OP
                $id_user = Auth::user()->id;

                $nbr_credit_dispo = Credit::where('codeAgent', $id_user);
                $nbr_credit_dispo = $nbr_credit_dispo->count();

                $nbr_credit_saint = Credit::where('etatCredit', 'SAINT')->where('codeAgent', $id_user);
                $nbr_credit_saint = $nbr_credit_saint->count();

                $nbr_credit_contentieux = Credit::where('etatCredit', 'CONTENTIEUX')->where('codeAgent', $id_user);
                $nbr_credit_contentieux = $nbr_credit_contentieux->count();

                $nbr_credit_immobilises = Credit::where('etatCredit', 'IMMOBILISE')->where('codeAgent', $id_user);
                $nbr_credit_immobilises = $nbr_credit_immobilises->count();

                $credits = Credit::where('codeAgent', $id_user)->take(5)->get();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;

            default:
                return back();
                break;
        }
        return view('html/index', compact('profil_user', 'nbr_credit_dispo', 'nbr_credit_saint', 'nbr_credit_contentieux', 'nbr_credit_immobilises', 'credits', 'mes_fonctionnalites'));
    }

    public function verification($id_user)
    {
        $nbrMsg = message::where('codeAgent', $id_user)->where('notifier', 0)->get();
        $nbrMsg = $nbrMsg->count();
        return response()->json($nbrMsg);
    }

    public function UpdateNotification($id_user, $nbr_message)
    {
        $message = message::where('codeAgent', $id_user)->where('notifier', 0)->get();
        for ($i = 0; $i < count($message); $i++) {
            $id_msg = $message[$i]['id'];
            $un_message = message::find($id_msg);
            if ($un_message) {
                $un_message->notifier = 1;
                $un_message->save();
            }
        }
        return response()->json();
    }
}
