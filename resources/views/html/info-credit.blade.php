@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">CREDIT N°<span
                    style="color: rgb(84, 174, 84)">{{ $un_credit->id }}</span></h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('listesCredits') }}">LISTES DES CREDITS</a>
                    </li>
                    <li class="breadcrumb-item active"> Credit n°{{ $un_credit->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-text" style="color: rgb(84, 174, 84)">Informations sur le client </h3>
                    <hr>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Nom et Prénom : </h4>
                        <span style="font-size: 15px;flex:2">
                            {{ $un_credit->client->nom }}&nbsp;{{ $un_credit->client->prenom }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Sexe : </h4>
                        <span style="font-size: 15px;flex:2"> {{ $un_credit->client->sexe }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Age : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->client->age }} ans</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Telephone : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->client->telephone }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Email : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->client->email }}</span>
                    </div>
                    <div style="display:flex">
                        <h4 class="card-title" style="flex:1">Adresse : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->client->adresse }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-text" style="color: rgb(84, 174, 84)">Informations sur le crédit &nbsp
                        @if ($un_credit->etatCredit == 'PERTE')
                            <i class="fa fa-exclamation-triangle" style="color:red">
                            </i>
                        @endif
                    </h3>
                    <hr>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Bureau : </h4>
                        <span style="font-size: 15px;flex:2"> {{ $un_credit->bureau->intitule }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Agent : </h4>
                        <span style="font-size: 15px;flex:2"> {{ $un_credit->user->name }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Objet : </h4>
                        <span style="font-size: 15px;flex:2"> {{ $un_credit->objetCredit }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Type de prêt : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->produit->libelle }}</span>
                    </div>
                    <div style="display:flex">
                        <h4 class="card-title" style="flex:1">Date de la demande : </h4>
                        <span
                            style="font-size: 15px;flex:2">{{ \Carbon\Carbon::parse($un_credit->dateDemande)->format('d/m/Y') }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Montant deboursé : </h4>
                        <span style="font-size: 15px;flex:2">{{ $un_credit->montantAccorde }} FCFA</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Date déboursement : </h4>
                        <span
                            style="font-size: 15px;flex:2">{{ \Carbon\Carbon::parse($un_credit->dateDeboursement)->format('d/m/Y') }}</span>
                    </div>
                    <div style="display:flex">
                        <h4 class="card-title" style="flex:1">Première échéance : </h4>
                        <span
                            style="font-size: 15px;flex:2">{{ \Carbon\Carbon::parse($un_credit->dateInitiale)->format('d/m/Y') }}</span>
                    </div>

                    <div style="display:flex">
                        <h4 class="card-title" style="flex:1">Derniere écheance : </h4>
                        <span
                            style="font-size: 15px;flex:2">{{ \Carbon\Carbon::parse($un_credit->derniereEcheance)->format('d/m/Y') }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:1">Etat du crédit : </h4>
                        <span style="font-size: 15px;flex:2">
                            @if ($un_credit->etatCredit == 'PERTE')
                                <span class="label label-danger">
                                    {{ $un_credit->etatCredit }}
                                </span>
                            @endif
                            @if ($un_credit->etatCredit == 'CONTENTIEUX')
                                <span class="label label-info">
                                    {{ $un_credit->etatCredit }}
                                </span>
                            @endif
                            @if ($un_credit->etatCredit == 'IMMOBILISE')
                                <span class="label label-success">
                                    {{ $un_credit->etatCredit }}
                                </span>
                            @endif
                            @if ($un_credit->etatCredit == 'SAINT')
                                <span class="label label-warning">
                                    {{ $un_credit->etatCredit }}
                                </span>
                            @endif
                            @if ($un_credit->etatCredit == 'SOLDE')
                                <span class="label label-primary">
                                    {{ $un_credit->etatCredit }}
                                </span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <h3 class="card-title">Echéancier
                            </h3>
                            <h4 class="card-subtitle">{{ $un_credit->nombreEcheance }} écheances</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="color: rgb(84, 174, 84); font-size: 16px">
                                <tr>
                                    <th>N°</th>
                                    <th>Date Ech</th>
                                    <th>Nbr de retard</th>
                                    <th>Montant écheance </th>
                                    <th>Montant payé </th>
                                    <th>Date paiement </th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($echeanciers as $echeancier)
                                    <tr>
                                        <td>{{ $echeancier->numero_echeance }}</td>
                                        <td>{{ $echeancier->dateEcheance }}</td>
                                        <td>{{ $echeancier->nombre_jour_retard }} jours</td>
                                        <td>{{ $echeancier->montant_echeance }} FCFA</td>
                                        <td>{{ $echeancier->montant_paye }} FCFA</td>
                                        <td>{{ \Carbon\Carbon::parse($echeancier->date_paiement)->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($echeancier->etat_echeance == 'PAYE')
                                                <span class="label label-success">{{ $echeancier->etat_echeance }}</span>
                                            @endif
                                            @if ($echeancier->etat_echeance == 'IMPAYE')
                                                <span class="label label-danger">{{ $echeancier->etat_echeance }}</span>
                                            @endif
                                            @if ($echeancier->etat_echeance == 'EN ATTENTE')
                                                <span class="label label-info">{{ $echeancier->etat_echeance }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
