@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">LISTES DES CREDITS</h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a></li>
                    <li class="breadcrumb-item active">La Listes des Credits</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h3 class="card-title">{{ $nbr_credit_dispo }} Crédits </h3>
                            <h4 class="card-subtitle"> {{ $nbr_credit_en_cours }} en cours |
                                {{ $nbr_credit_solde }} soldés
                            </h4>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="ml-auto">
                                    @if ($profil_user != 4)
                                        <button class="btn waves-effect waves-light btn-success hidden-md-down"
                                            id="btn_eping" onclick="epingler({{ $nbr_credit_dispo }},{{ $credits }})">
                                            <a style="color: white">Epingler des credits
                                            </a>
                                        </button>
                                    @endif
                                    <button id="btn_envoye" style="display: none"
                                        class="btn waves-effect waves-light btn-primary hidden-md-down"
                                        onclick="envoyer_credits({{ $nbr_credit_dispo }},{{ $credits }},{{ Auth::user()->id }})">
                                        <a style="color: white" id="sendEplinglement">
                                            <span id="nbr_credit_epingler">0</span>&nbsp;Envoyer
                                        </a>
                                    </button>
                                </div>
                                &nbsp;
                                <div class="">
                                    <button id="btn_annuler" style="display: none"
                                        class="btn waves-effect waves-light btn-danger hidden-md-down"
                                        onclick="annuler_epingle()">
                                        <a style="color: white">
                                            Annuler
                                        </a>
                                    </button>
                                </div>
                                &nbsp;
                                <div class="">
                                    <select class="custom-select b-0" id="slt_trier"
                                        onchange="trierCredit({{ $profil_user }},{{ $mes_fonctionnalites }})">
                                        <option value="0" selected="">Etat crédit (tous)</option>
                                        <option value="1">SAINT</option>
                                        <option value="2">CONTENTIEUX</option>
                                        <option value="3">IMMOBILISE</option>
                                        <option value="4">PERTE</option>
                                        <option value="5">SOLDE</option>
                                        <option value="6">Crédits en cours</option>
                                    </select>
                                </div>
                                {{-- &nbsp;
                                <div class="w-10">
                                    <input class="custom-select b-0" type="text" placeholder="NOM & PRENOM DU CLIENT"
                                        id="search">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="color: rgb(84, 174, 84); font-size: 16px">
                                <tr>
                                    <th>Code</th>
                                    <th>Nom et Prénom du client </th>
                                    <th>Téléphone</th>
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
                            <tbody id="contenuCredit">
                                @forelse ($credits as $credit)
                                    <tr style="backgrounndd:rgb(239, 229, 229)">
                                        <td id="col_checkbox{{ $credit->id }}" style="display: none">
                                            <input class="" type="checkbox" name=""
                                                id="checkbox{{ $credit->id }}"
                                                onclick="epingler_credit({{ $credit->id }})">
                                        </td>
                                        <td id="col_id{{ $credit->id }}" style="display: block">
                                            {{ $credit->id }}
                                        </td>
                                        <td>{{ $credit->client->nom }}&nbsp;{{ $credit->client->prenom }}</td>
                                        <td>{{ $credit->client->telephone }}</td>
                                        <td>{{ $credit->montantAccorde }} FCFA</td>
                                        <td>{{ \Carbon\Carbon::parse($credit->dateDeboursement)->format('d/m/Y') }}</td>
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
@endsection
