<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Credit;
use App\Models\Echeancier;
use App\Models\message;
use App\Models\Profil;
use App\Models\Remboursement;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function listesCredits()
    {
        $profil_user = Auth::user()->codeProfil;
        switch ($profil_user) {
            case 1:
                //ADMINISTRATEUR
                $nbr_credit_dispo = Credit::all();
                $nbr_credit_total = Credit::all();

                $nbr_credit_dispo = $nbr_credit_dispo->count();
                $nbr_credit_solde = Credit::where('etatCredit', 'SOLDE')->get()->count();
                $nbr_credit_en_cours = $nbr_credit_dispo - $nbr_credit_solde;

                $credits = Credit::all();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 2:
                //CHEF AGENCE
                $nbr_credit_dispo = Credit::all();
                $nbr_credit_total = Credit::all();

                $nbr_credit_dispo = $nbr_credit_dispo->count();
                $nbr_credit_solde = Credit::where('etatCredit', 'SOLDE')->get()->count();
                $nbr_credit_en_cours = $nbr_credit_dispo - $nbr_credit_solde;

                $credits = Credit::all();

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 3:
                //CHEF BUREAU
                $bureau_user = Auth::user()->codeBureau;
                $mes_op = User::where('codeBureau', $bureau_user)->pluck('id');

                $nbr_credit_dispo = Credit::whereIn('codeAgent', $mes_op);
                $nbr_credit_dispo = $nbr_credit_dispo->count();

                $credits = Credit::whereIn('codeAgent', $mes_op)->get();
                $nbr_credit_solde = Credit::where('etatCredit', 'SOLDE')->whereIn('codeAgent', $mes_op)->get()->count();
                $nbr_credit_en_cours = $nbr_credit_dispo - $nbr_credit_solde;

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;
            case 4:
                //OP
                $id_user = Auth::user()->id;

                $nbr_credit_dispo = Credit::where('codeAgent', $id_user);
                $nbr_credit_dispo = $nbr_credit_dispo->count();
                $nbr_credit_total = Credit::all();
                $nbr_credit_total = $nbr_credit_total->count();

                $credits = Credit::where('codeAgent', $id_user)->get();
                $nbr_credit_solde = Credit::where('etatCredit', 'SOLDE')->where('codeAgent', $id_user)->get()->count();
                $nbr_credit_en_cours = $nbr_credit_dispo - $nbr_credit_solde;

                $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
                break;

            default:
                return back();
                break;
        }
        return view('html/listes-credits', compact('profil_user', 'nbr_credit_dispo', 'nbr_credit_solde', 'nbr_credit_en_cours', 'credits', 'mes_fonctionnalites'));
    }

    public function infoCredit($idCredit)
    {
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        $un_credit = Credit::find($idCredit);
        $echeanciers = Echeancier::where('codecredit', $idCredit)->orderBy('numero_echeance', 'asc')->get();
        return view('html/info-credit', compact('profil_user', 'mes_fonctionnalites', 'un_credit', 'echeanciers'));
    }

    public function trierCredit($elementSelectionne)
    {
        $profil_user = Auth::user()->codeProfil;
        if ($elementSelectionne == 6) {
            switch ($profil_user) {
                case 1:
                    //ADMINISTRATEUR
                    $credits = Credit::whereNot('etatCredit', 'SOLDE')->get();
                    break;
                case 2:
                    //CHEF AGENCE
                    $credits = Credit::whereNot('etatCredit', 'SOLDE')->get();
                    break;
                case 3:
                    //CHEF BUREAU
                    $bureau_user = Auth::user()->codeBureau;
                    $mes_op = User::where('codeBureau', $bureau_user)->where('codeProfil', 4)->pluck('id');
                    $credits = Credit::whereIn('codeAgent', $mes_op)->whereNot('etatCredit', 'SOLDE')->get();
                    break;
                case 4:
                    //OP
                    $id_user = Auth::user()->id;
                    $credits = Credit::where('codeAgent', $id_user)->whereNot('etatCredit', 'SOLDE')->get();
                    break;

                default:
                    return back();
                    break;
            }
        } else {
            switch ($elementSelectionne) {
                case 1:
                    //SAINT
                    $elementSelectionne = "SAINT";
                    break;
                case 2:
                    //CONTENTIEUX
                    $elementSelectionne = "CONTENTIEUX";
                    break;
                case 3:
                    //IMMOBILISE
                    $elementSelectionne = "IMMOBILISE";
                    break;
                case 4:
                    //PERTE
                    $elementSelectionne = "PERTE";
                    break;
                case 5:
                    //SOLDE
                    $elementSelectionne = "SOLDE";
                    break;

                default:
                    break;
            }
            switch ($profil_user) {
                case 1:
                    //ADMINISTRATEUR
                    $credits = Credit::where('etatCredit', $elementSelectionne)->get();
                    break;
                case 2:
                    //CHEF AGENCE
                    $credits = Credit::where('etatCredit', $elementSelectionne)->get();
                    break;
                case 3:
                    //CHEF BUREAU
                    $bureau_user = Auth::user()->codeBureau;
                    $mes_op = User::where('codeBureau', $bureau_user)->where('codeProfil', 4)->pluck('id');
                    $credits = Credit::whereIn('codeAgent', $mes_op)->where('etatCredit', $elementSelectionne)->get();
                    break;
                case 4:
                    //OP
                    $id_user = Auth::user()->id;
                    $credits = Credit::where('codeAgent', $id_user)->where('etatCredit', $elementSelectionne)->get();
                    break;

                default:
                    return back();
                    break;
            }
        }
        return response()->json($credits);
    }

    public function recupCA($id_client, $id_agent)
    {
        $client = Client::find($id_client);
        $nom = $client->nom;
        $prenom = $client->prenom;
        $telephone = $client->telephone;
        $user = User::find($id_agent);
        $user = $user->name;
        $data = [$nom, $prenom, $telephone, $user];
        return response()->json($data);
    }

    public function envoieMsg($tableau, Request $request)
    {
        $tableau = json_decode($tableau);

        try {
            foreach ($tableau as $data) {
                $id_agent = $data->id_agent;
                $id_credit = $data->id_credit;
                $id_user = $data->id_user;
                $user = User::find($id_user);
                $expName = $user->name;

                $idProfil = $user->codeProfil;
                $profil = Profil::find($idProfil);
                $expProfil = $profil->intitule;


                $message = message::create([
                    'codeAgent' => $id_agent,
                    'credit' => $id_credit,
                    'message' => "Plus de suivi pour ce credit",
                    'expediteur' => $expName,
                    'profilExpediteur' => $expProfil,
                    'notifier' => 0,
                    'vu' => 0,
                ]);
            }
            return response()->json(['message' => 'Les messages ont été créés avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur sest produite lors de la création des messages.'], 500);
        };
    }
}
