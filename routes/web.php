<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalysePerfController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\EcheancierPdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PasswordForgotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profilsFonctionnalitesController;
use App\Http\Controllers\rapportPretController;
use App\Http\Controllers\RelanceController;
use App\Http\Controllers\surbordonneController;

Route::group(['middleware' => 'authSR'], function () {
    // Les routes qui nécessitent une authentification ici

    Route::get('/', [LinkController::class, 'index']);

    Route::get('SR-PADME-Dashboard', [LinkController::class, 'index'])->name('index');

    Route::get('SR-PADME-Listes des credits', [CreditController::class, 'listesCredits'])->name('listesCredits');

    Route::get('SR-PADME-Compte', [ProfileController::class, 'show'])->name('monProfil');

    Route::get('SR-PADME-Relance', [RelanceController::class, 'index'])->name('relance');

    Route::get('SR-PADME-Message', [MessageController::class, 'index'])->name('message');

    Route::get('SR-PADME-Credit-{idCredit}', [CreditController::class, 'infoCredit'])->name('infoCredit');

    Route::get('/SR-PADME-Trier Credit/{elementSelectionne}', [CreditController::class, 'trierCredit']);

    Route::get('/SR-PADME-recupCA/{id_client}/{id_agent}', [CreditController::class, 'recupCA']);

    Route::get('/SR-PADME-Envoie de message/{tableau}', [CreditController::class, 'envoieMsg']);

    Route::get('/SR-PADME-Administration/Verification/{id_user}', [LinkController::class, 'verification']);

    Route::get('/SR-PADME-UpdateNotifier/{id_user}/{nbr_message}', [LinkController::class, 'UpdateNotification']);

    Route::get('/SR-PADME-Prevoir un credit/{datePrevision}', [RelanceController::class, 'prevoir']);

    Route::get('/SR-PADME-Avertir un agent/{id_user}/{id_agent}/{taux}/{observation}', [surbordonneController::class, 'avertirAgent']);

    Route::get('SR-PADME-Analyses de preformences', [AnalysePerfController::class, 'analysePerf'])->name('analyse-remboursement');

    Route::get('SR-PADME-Evaluation de subordonné', [surbordonneController::class, 'surbordonneH'])->name('surbordonneH');

    Route::get('SR-PADME-Verification des relances', [RelanceController::class, 'verificationRelance']);

    Route::get('SR-PADME-Administration', [AdminController::class, 'espaceAdmin'])->name('espaceAdmin');

    Route::get('SR-PADME-Administration/Bloquer un utilisateur/{id}', [AdminController::class, 'bloquerUtilisateur'])->name('okk');

    Route::get('SR-PADME-Administration/Changement profil/{id}/{selected}', [AdminController::class, 'changerUtilisateur']);

    Route::get('SR-PADME-Administration/Recherche/{mot}', [AdminController::class, 'rechercherUtilisateur']);

    Route::get('SR-PADME-Administration/Trier les utilisateurs/{mot}', [AdminController::class, 'trierUtilisateur']);

    Route::get('SR-PADME-Administration/recupABP/{codeAgence}/{codeBureau}/{codeProfil}', [AdminController::class, 'recupABP']);

    Route::get('SR-PADME-Administration/listes des profils', [AdminController::class, 'listeProfil']);

    Route::get('SR-PADME-Administration/Recherche de fonctionnalites/{idProfil}', [profilsFonctionnalitesController::class, 'rechercheFonc']);

    Route::get('SR-PADME-Administration/Mettre a jour fonctionnalité/{idProfil}/{idFonc}', [profilsFonctionnalitesController::class, 'updateFonc']);

    Route::get('SR-PADME-Administration-Profils et Fonctionnalités', [profilsFonctionnalitesController::class, 'profils_fonctionnalites'])->name('profils_fonctionnalites');

    Route::post('SR-PADME-Compte/update-password', [ProfileController::class, 'updatePassword'])->name('profil.updatePassword');

    Route::post('SR-PADME-Formulaire d analyse en cours de traitement', [AnalysePerfController::class, 'analyseInfo'])->name('analyse-info');

    Route::get('SR-PADME-Rapport des prêts', [rapportPretController::class, 'rapportEnCours'])->name('rapportEnCours');

    Route::get('/deconnexion', [LoginController::class, 'logout'])->name('deconnexion');
});

Route::get('SR PADME - Connexion', [linkController::class, 'form']);

Route::post('/connexion', [LoginController::class, 'login'])->name('connexion');

Route::get('/Recuperation de mot de passe', [PasswordForgotController::class, 'formPassword'])->name('password-forgot');

Route::post('/Envoi de mail', [PasswordForgotController::class, 'mailPassword'])->name('updatePassword');

Route::get('/SR-PADME-Telechargement{idCredit}', [EcheancierPdfController::class, 'generatePdfEcheancier'])->name('pdf');

Route::get('/rendu', [EcheancierPdfController::class, 'rendu']);
