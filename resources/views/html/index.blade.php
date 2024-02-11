@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">ACCUEIL</h2>
        </div>
        {{-- <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div> --}}
    </div>
@endsection

@section('contenu')
    <div class="row">
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <h1 class="card-text" style="color: rgb(84, 174, 84)">{{ $nbr_credit_dispo }}</h1>
                    <h4 class="card-title">Nombre total de credits disponibles.</h4>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <h1 class="card-text" style="color: rgb(84, 174, 84)">{{ $nbr_credit_saint }}</h1>
                    <h4 class="card-title">Nombre total de credits saints.</h4>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <h1 class="card-text" style="color: rgb(84, 174, 84)">{{ $nbr_credit_contentieux }}</h1>
                    <h4 class="card-title">Nombre total de credits contentieux.</h4>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100">

                <div class="card-body">
                    <h1 class="card-text" style="color: rgb(84, 174, 84)">{{ $nbr_credit_immobilises }}</h1>
                    <h4 class="card-title">Nombre total de credits immobilisés.</h4>
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
                            <h3 class="card-title">Quelques prêts contractés</h3>
                            <h4 class="card-subtitle">avec leurs états.</h4>
                        </div>
                        <div class="col-1">
                            @foreach ($mes_fonctionnalites as $fonct)
                                @if ($fonct == 1)
                                    <a href="{{ route('listesCredits') }}"
                                        class="btn waves-effect waves-light btn-success hidden-md-down">Tous</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="color: rgb(84, 174, 84); font-size: 16px">
                                <tr>
                                    <th>Code</th>
                                    <th>Nom et Prénom du client </th>
                                    <th>Telephone</th>
                                    <th>Montant débourcé</th>
                                    <th>Date de débourcement</th>
                                    <th>Etats</th>
                                    @if ($profil_user != 4)
                                        <th>Agent</th>
                                    @endif
                                    @foreach ($mes_fonctionnalites as $fonct)
                                        @if ($fonct == 2)
                                            <th> Plus</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($credits as $credit)
                                    <tr>
                                        <td>{{ $credit->id }}</td>
                                        <td>{{ $credit->client->nom }}&nbsp;{{ $credit->client->prenom }}</td>
                                        <td>{{ $credit->client->telephone }}</td>
                                        <td>{{ $credit->montantAccorde }} FCFA</td>
                                        <td>{{ \Carbon\Carbon::parse($credit->dateDeboursement)->format('d/m/Y') }}
                                        </td>
                                        @if ($credit->etatCredit == 'PERTE')
                                            <td><span class="label label-danger">{{ $credit->etatCredit }}</span>
                                            </td>
                                        @endif
                                        @if ($credit->etatCredit == 'CONTENTIEUX')
                                            <td><span class="label label-info">{{ $credit->etatCredit }}</span>
                                            </td>
                                        @endif
                                        @if ($credit->etatCredit == 'IMMOBILISE')
                                            <td><span class="label label-success">{{ $credit->etatCredit }}</span>
                                            </td>
                                        @endif
                                        @if ($credit->etatCredit == 'SAINT')
                                            <td><span class="label label-warning">{{ $credit->etatCredit }}</span>
                                            </td>
                                        @endif
                                        @if ($credit->etatCredit == 'SOLDE')
                                            <td><span class="label label-primary">{{ $credit->etatCredit }}</span>
                                            </td>
                                        @endif
                                        @if ($profil_user != 4)
                                            <th>{{ $credit->user->name }}</th>
                                        @endif
                                        @foreach ($mes_fonctionnalites as $fonct)
                                            @if ($fonct == 2)
                                                <td style="text-align:">
                                                    <a href="{{ route('infoCredit', ['idCredit' => $credit->id]) }}">voir
                                                        plus</a>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- 
@extends('base')

@section('contenu')
    <table>
        <tr>
            <td>nom</td>
            <td>categorie</td>
        </tr>
        @foreach ($affichage as $affichage)
            <tr>
                <td>{{ $affichage->nom }}</td>
                <td>{{ $affichage->categorie->nom }}</td>
            </tr>
        @endforeach
    </table>
@endsection --}}
