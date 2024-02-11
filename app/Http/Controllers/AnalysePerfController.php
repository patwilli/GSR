<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Echeancier;
use App\Models\Remboursement;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalysePerfController extends Controller
{
    public function analysePerf()
    {
        $grandTaux = 0;
        $monthTauxArray = [];

        function getDatesOfMonth($yearMonth)
        {
            $currentYear = date('Y');
            $startDate = $yearMonth . '-01';
            $endDate = $yearMonth . '-' . date('t', strtotime($startDate));

            $dates = [];
            $currentDate = $startDate;

            while ($currentDate <= $endDate) {
                $dates[] = $currentDate;
                $currentDate = date('Y-m-d', strtotime($currentDate . ' + 1 day'));
            }

            return $dates;
        }

        $numberOfMonths = 12;
        $startDate = now()->subMonths($numberOfMonths)->startOfMonth();
        $endDate = now()->subMonth()->endOfMonth();
        $arrayMonth = [];
        for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {
            $arrayMonth[] = $date->format('Y-m');
        }
        for ($i = 0; $i < count($arrayMonth); $i++) {
            $allDates = getDatesOfMonth($arrayMonth[$i]);
            $petitTauxTotal = 0; // Réinitialisation pour chaque mois
            foreach ($allDates as $date) {
                $mtn_echeance = 0;
                $mtn_echeance_paye = 0;
                $echeance = Echeancier::where('dateEcheance', $date)->get();
                foreach ($echeance as $item) {
                    $mtn_echeance += $item->montant_echeance;
                    $mtn_echeance_paye += $item->montant_paye;
                }
                $petitTaux = 0;
                if ($mtn_echeance != 0) {
                    $petitTaux = ($mtn_echeance_paye * 100) / $mtn_echeance;
                }
                $petitTauxTotal += $petitTaux;
            }
            $grandTaux += $petitTauxTotal;
            $grandTaux = ($grandTaux / count($allDates));
            $grandTaux =  number_format($grandTaux, 1);
            $monthTauxArray += [
                $i => [
                    'mois' => $arrayMonth[$i],
                    'taux' => $grandTaux,
                ]
            ];
        }
        $count = count($monthTauxArray);
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html.analyse-remboursement', compact('profil_user', 'mes_fonctionnalites', 'monthTauxArray', 'count'));
    }

    public function analyseInfo(Request $request)
    {
        $request->validate([
            'datedebut' => 'required|date',
            'datefin' => 'required|date|after_or_equal:datedebut', // La date de fin doit être après ou égale à la date de début
        ]);
        $dateDebut = Carbon::parse($request->input('datedebut'));
        $dateFin = Carbon::parse($request->input('datefin'));

        $datesArray = [];
        $datesTauxArray = [];

        while ($dateDebut->lessThanOrEqualTo($dateFin)) {
            $datesArray[] = $dateDebut->toDateString();
            $dateDebut->addDay();
        }
        $dateDebut = $request->datedebut;
        $dateFin = $request->datefin;

        $nbr_de_credit = 0;
        $nbr_creditSoldeCount = 0;
        $nbr_creditPerteCount = 0;
        $montant_total_debourse = 0;
        $montant_total_paye = 0;
        $grandTaux = 0;

        for ($i = 0; $i < count($datesArray); $i++) {
            $creditCount = Credit::where('dateDeboursement', $datesArray[$i])->get()->count();
            $creditSoldeCount = Credit::where('dateDeboursement', $datesArray[$i])->where('etatCredit', 'SOLDE')->get()->count();
            $creditPerduCount = Credit::where('dateDeboursement', $datesArray[$i])->where('etatCredit', 'PERTE')->get()->count();
            $creditDebourse = Credit::where('dateDeboursement', $datesArray[$i])->get();
            foreach ($creditDebourse as $item) {
                $montant_total_debourse += $item->montantAccorde;
                $lesPayements = Echeancier::where('codecredit', $item->id)->get();
                for ($j = 0; $j < count($lesPayements); $j++) {
                    $montant_total_paye += $lesPayements[$j]['montant_paye'];
                }
            }
            $nbr_de_credit += $creditCount;
            $nbr_creditSoldeCount += $creditSoldeCount;
            $nbr_creditPerteCount += $creditPerduCount;
            $mtn_echeance = 0;
            $mtn_echeance_paye = 0;
            $echeance = Echeancier::where('dateEcheance', $datesArray[$i])->get();
            $echeanceSolde = Echeancier::where('dateEcheance', $datesArray[$i])->where('etat_echeance', 'PAYE')->get()->count();
            $echeanceNonSolde = Echeancier::where('dateEcheance', $datesArray[$i])->whereNot('etat_echeance', 'PAYE')->get()->count();
            foreach ($echeance as $item) {
                $mtn_echeance += $item->montant_echeance;
                $mtn_echeance_paye += $item->montant_paye;
            }
            $petitTaux = 0;
            if ($mtn_echeance != 0) {
                $petitTaux = ($mtn_echeance_paye * 100) / $mtn_echeance;
            }
            $datesTauxArray += [
                $i => [
                    'date' => $datesArray[$i],
                    'taux' => intval($petitTaux),
                ]
            ];
            $grandTaux += $petitTaux;
        }
        $grandTaux = intval($grandTaux / count($datesTauxArray));
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        return view('html/analyse-info', compact(
            'profil_user',
            'mes_fonctionnalites',
            'dateDebut',
            'dateFin',
            'nbr_de_credit',
            'montant_total_debourse',
            'montant_total_paye',
            'nbr_creditSoldeCount',
            'nbr_creditPerteCount',
            'datesTauxArray',
            'mtn_echeance',
            'mtn_echeance_paye',
            'echeanceSolde',
            'echeanceNonSolde',
            'grandTaux',
        ));
    }
}
