<?php

namespace Database\Seeders;

use App\Models\Echeancier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcheancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remplissage de la table d'échéanciers en utilisant les données fournies

        $codeCredit = 5; // Identifiant du crédit auquel les échéances sont liées
        $dateInitial = '2023-03-14';
        $nombreEcheance = 10;
        $montantEcheance = 100000;
        $numPaye = [1, 2, 3, 4, 5, 6];
        $numEnAttente = [7, 8, 9, 10];
        $numImpaye = [];

        for ($numeroEcheance = 1; $numeroEcheance <= $nombreEcheance; $numeroEcheance++) {
            $dateEcheance = date('Y-m-d', strtotime('+' . ($numeroEcheance - 1) . ' months', strtotime($dateInitial)));
            $montantPaye = $montantEcheance / (random_int(2, 6));
            // le if de 'PAYE'
            if (in_array($numeroEcheance, $numPaye)) {
                $montantPaye = $montantEcheance;
                $datePaiement = $dateEcheance;
                $mtnImpaye = 0;
                $jourRetard = 0;
                $etatEcheance = 'PAYE';
            }
            // le if de 'IMPAYE'
            if (in_array($numeroEcheance, $numImpaye)) {
                $montantPaye = $montantPaye;
                $mtnImpaye = $montantEcheance - $montantPaye;
                $jourRetard = (random_int(1, 15));
                $datePaiement = date('Y-m-d', strtotime('+' . ($jourRetard) . ' days', strtotime($dateEcheance)));
                $etatEcheance = 'IMPAYE';
            }
            // le if de 'EN ATTENTE'
            if (in_array($numeroEcheance, $numEnAttente)) {
                $montantPaye = 0;
                $mtnImpaye = 0;
                $jourRetard = 0;
                $datePaiement = null;
                $etatEcheance = 'EN ATTENTE';
            }
            // Insérer l'enregistrement dans la table des échéanciers
            DB::table('echeanciers')->insert([
                'codeCredit' => $codeCredit,
                'numero_echeance' => $numeroEcheance,
                'dateEcheance' => $dateEcheance,
                'nombre_jour_retard' => $jourRetard,
                'montant_echeance' => $montantEcheance,
                'montant_paye' => $montantPaye,
                'date_paiement' => $datePaiement,
                'montant_impaye' => $mtnImpaye,
                'etat_echeance' => $etatEcheance,
            ]);
        }
    }
}
