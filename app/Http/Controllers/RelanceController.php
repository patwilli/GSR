<?php

namespace App\Http\Controllers;

use App\Mail\CreditPayementMail;
use App\Mail\CreditRappelMail;
use App\Mail\MailRelancePayement;
use App\Mail\RelancePayement;
use App\Mail\RelanceRappel;
use App\Models\Credit;
use App\Models\Echeancier;
use App\Models\relance;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelanceController extends Controller
{
    public function index()
    {
        // for ($i = 0; $i < 2; $i++) {
        //     Mail::to('patricesossavi@gmail.com')->send(new RelanceRappel('17/30/2003', 5000));
        // }
        // dd('cool');
        $profil_user = Auth::user()->codeProfil;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        $time_today = time();
        $date_today = date('Y-m-d');
        $deux_jours = date('Y-m-d', $time_today + (86400 * 2));
        $today_echeance = Echeancier::where('dateEcheance', $date_today)->get();
        $deux_jours_echeance = Echeancier::where('dateEcheance', $deux_jours)->get();
        $merged_echeance = $today_echeance->concat($deux_jours_echeance);

        $id_user = Auth::user()->id;
        $credits = Credit::where('codeAgent', $id_user)->get();

        $tab_id_credit = array();
        $nbr_paiement = 0;
        $nbr_rappel = 0;
        foreach ($credits as $credit) {
            $id = $credit->id;
            $tab_id_credit[] = $id;
        }
        foreach ($today_echeance as $item) {
            if (in_array($item->codecredit, $tab_id_credit)) {
                $nbr_paiement += 1;
                $etatRelance = relance::where('codeCredit', $item->codecredit)->where('dateRelance', $date_today)->pluck('statut');
                $etatRelance = $etatRelance->last();
                if ($etatRelance != 'ok') {
                    try {
                        Mail::to($item->credit->client->email)->send(new RelancePayement($item->dateEcheance, $item->montant_echeance));
                        $relance = relance::create([
                            'codeCredit' => $item->codecredit,
                            'dateRelance' => date('Y-m-d'),
                            'dateEcheance' => $item->dateEcheance,
                            'info' => "Mail de payement",
                            'statut' => 'ok',
                        ]);
                    } catch (\Exception $e) {
                        $relance = relance::create([
                            'codeCredit' => $item->codecredit,
                            'dateRelance' => date('Y-m-d'),
                            'dateEcheance' => $item->dateEcheance,
                            'info' => "Mail de payement",
                            'statut' => 'echec',
                        ]);
                    }
                }
            }
        }
        foreach ($deux_jours_echeance as $item) {
            if (in_array($item->codecredit, $tab_id_credit)) {
                $nbr_rappel += 1;
                $etatRelance = relance::where('codeCredit', $item->codecredit)->where('dateRelance', $date_today)->pluck('statut');
                $etatRelance = $etatRelance->last();
                if ($etatRelance != 'ok') {
                    try {
                        Mail::to($item->credit->client->email)->send(new RelanceRappel($item->dateEcheance, $item->montant_echeance));
                        $relance = relance::create([
                            'codeCredit' => $item->codecredit,
                            'dateRelance' => date('Y-m-d'),
                            'dateEcheance' => $item->dateEcheance,
                            'info' => "Mail de rappel",
                            'statut' => 'ok',
                        ]);
                    } catch (\Exception $e) {
                        $relance = relance::create([
                            'codeCredit' => $item->codecredit,
                            'dateRelance' => date('Y-m-d'),
                            'dateEcheance' => $item->dateEcheance,
                            'info' => "Mail de rappel",
                            'statut' => 'echec',
                        ]);
                    }
                }
            }
        }

        return view('html/gestion-relance', compact(
            'profil_user',
            'mes_fonctionnalites',
            'merged_echeance',
            'date_today',
            'deux_jours',
            'nbr_paiement',
            'nbr_rappel',
            'tab_id_credit'
        ));
    }
    public function prevoir($datePrevision)
    {
        $echeance = Echeancier::where('dateEcheance', $datePrevision)->get();
        return response()->json($echeance);
    }
    public function verificationRelance()
    {
        $time_today = time();
        $date_today = date('Y-m-d');
        $deux_jours = date('Y-m-d', $time_today + (86400 * 2));
        $today_echeance = Echeancier::where('dateEcheance', $date_today)->get();
        $deux_jours_echeance = Echeancier::where('dateEcheance', $deux_jours)->get();
        $merged_echeance = $today_echeance->concat($deux_jours_echeance);
        $id_user = Auth::user()->id;
        $credits = Credit::where('codeAgent', $id_user)->get();
        $tab_id_credit = array();
        $resultatVerification = array();
        foreach ($credits as $credit) {
            $id = $credit->id;
            $tab_id_credit[] = $id;
        }
        foreach ($today_echeance as $item) {
            if (in_array($item->codecredit, $tab_id_credit)) {
                $req = relance::where('codeCredit', $item->codecredit)->where('info', '<>', 'sms')->pluck('statut');
                if ($req->count() > 0) {
                    $resultatVerification[] = [
                        'codecredit' => $item->codecredit,
                        'statut' => $req->last(),
                    ];
                }
            }
        }

        foreach ($deux_jours_echeance as $item) {
            if (in_array($item->codecredit, $tab_id_credit)) {
                $req = relance::where('codeCredit', $item->codecredit)->where('info', '<>', 'sms')->pluck('statut');
                if ($req->count() > 0) {
                    $resultatVerification[] = [
                        'codecredit' => $item->codecredit,
                        'statut' => $req->last(),
                    ];
                }
            }
        }
        return response()->json($resultatVerification);
    }
    // public function test()
    // {
    //     Mail::to('patricesossavi@gmail.com')->send(new RelanceRappel());
    //     Mail::to('patricesossavi@gmail.com')->send(new RelancePayement());
    //     return "E-mail Markdown envoyé avec succès";
    // }
}
