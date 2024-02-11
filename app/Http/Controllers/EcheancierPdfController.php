<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Echeancier;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class EcheancierPdfController extends Controller
{
    public function generatePdfEcheancier($idCredit)
    {
        $un_credit = Credit::find($idCredit);
        $echeanciers = Echeancier::where('codecredit', $idCredit)->orderBy('numero_echeance', 'asc')->get();
        $data = [
            'un_credit' => $un_credit,
            'echeanciers' => $echeanciers,
        ];


        $html = view('pdf.echeancier', $data)->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // Options supplémentaires (facultatif)
        $pdf->setPaper('A4', 'portrait');

        // Rendu du PDF
        $pdf->render();

        // Génération du nom de fichier unique
        $filename = 'Rapport' . time() . '.pdf';

        // Chemin complet pour enregistrer le fichier
        $path = public_path('pdf/' . $filename);

        // Enregistrement du contenu du PDF dans un fichier
        file_put_contents($path, $pdf->output());

        // Téléchargement du fichier PDF
        return response()->download($path, $filename);
    }

    function rendu()
    {
        return view('pdf.echeancier');
    }
}
