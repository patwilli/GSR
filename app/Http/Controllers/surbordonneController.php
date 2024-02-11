<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use App\Models\Fonctionnalite;
use App\Models\message;
use App\Models\prod;
use App\Models\Profil;
use App\Models\Remboursement;
use App\Models\Role;
use App\Models\User;

class surbordonneController extends Controller
{
    public function surbordonneH()
    {
        function sommeTableau($tableau)
        {
            $somme = 0;
            // Parcours des éléments du tableau et addition
            foreach ($tableau as $element) {
                $somme += $element;
            }
            return $somme;
        }

        $bureau_user = Auth::user()->codeBureau;
        $mes_op = User::where('codeBureau', $bureau_user)
            ->where('codeProfil', 4)
            ->pluck('id');

        $opCount = $mes_op->count();

        $tab = array();
        for ($i = 0; $i < $opCount; $i++) {
            // $un_op = 8;
            $un_op = $mes_op[$i];
            $credits = Credit::where('codeAgent', $un_op)->get();
            $countCredit = $credits->count();
            $nomOp = User::where('id', $un_op)->pluck('name');
            $somAcc = 0;
            $somPay = 0;
            $tabPay = array();
            for ($j = 0; $j < $countCredit; $j++) {
                $somAcc += $credits[$j]['montantAccorde'];
                $countRem = Remboursement::where('codeCredit', $credits[$j]['id'])->get()->count();
                $payement = Remboursement::where('codeCredit', $credits[$j]['id'])->get();
                for ($k = 0; $k < $countRem; $k++) {
                    $somPay += $payement[$k]['montantPayeCredit'];
                }
                $tabPay[] += $somPay;
            }
            // dd($un_op, $nomOp, $countCredit, $credits, $somAcc, $countRem, $payement, $tabPay, sommeTableau($tabPay));
            $taux = 0;
            $observation = "Pas d'observation";
            if ($somAcc != 0) {
                $taux = ((sommeTableau($tabPay) * 100) / $somAcc);
                switch (true) {
                    case ($taux > 10 && $taux < 30):
                        $observation = "Assez bien";
                        break;
                    case ($taux >= 30 && $taux < 60):
                        $observation = "Bien";
                        break;
                    case ($taux >= 60 && $taux < 85):
                        $observation = "Tres bien";
                        break;
                    case ($taux >= 85):
                        $observation = "Excellent";
                        break;
                    default:
                        $observation = "Passable ! ! !";
                        break;
                }
            }
            $taux = intval($taux);
            $tab += [
                $i => [
                    'id' => $un_op,
                    'nomPrenom' => $nomOp,
                    'nbrCredit' => $credits,
                    'montantTotalAccorde' => $somAcc,
                    'montantTotalPaye'  => sommeTableau($tabPay),
                    'montantTotalRestant' => $somAcc - sommeTableau($tabPay),
                    'tauxRemboursement' => $taux,
                    'observation' => $observation,
                ]
            ];
        }
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html/surbordonneH', compact('profil_user', 'mes_fonctionnalites', 'opCount', 'tab'));
    }

    public function avertirAgent($id_user, $id_agent, $taux, $observation)
    {
        $user = User::find($id_user);
        $expName = $user->name;
        $idProfil = $user->codeProfil;
        $profil = Profil::find($idProfil);
        $expProfil = $profil->intitule;
        $message = message::create([
            'codeAgent' => $id_agent,
            'credit' => 0,
            'message' => "Votre taux de remboursement est de " . $taux . "% donc " . $observation . ".Veillez redoubler d'effort pour le bien de tous.",
            'expediteur' => $expName,
            'profilExpediteur' => $expProfil,
            'notifier' => 0,
            'vu' => 0,
        ]);
    }
}
