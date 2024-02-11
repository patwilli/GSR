@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">EVALUATION SURBORDONNE</h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a>
                    </li>
                    <li class="breadcrumb-item active">EVALUATION SURBORDONNE</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h3 class="card-title">({{ $opCount }}) Opérateurs Polyvalents évalués</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom & Prénom de l'agent</th>
                                    <th>Nombre de Credits</th>
                                    <th>Montant Total des prêts</th>
                                    <th>Montant Total payé</th>
                                    <th>Montant Restant</th>
                                    <th>Taux</th>
                                    <th>Observations</th>
                                    <th>Avertissement</th>
                                </tr>
                            </thead>
                            <tbody id="contenu">
                                @for ($i = 0; $i < $opCount; $i++)
                                    <tr class="">
                                        <td class="txt-oflo">{{ $tab[$i]['nomPrenom'][0] }}</td>
                                        <td class="text-center">{{ $tab[$i]['nbrCredit']->count() }}</td>
                                        <td class="txt-oflo">{{ $tab[$i]['montantTotalAccorde'] }} fcfa</td>
                                        <td class="txt-oflo">{{ $tab[$i]['montantTotalPaye'] }} fcfa</td>
                                        <td class="txt-oflo">{{ $tab[$i]['montantTotalRestant'] }} fcfa</td>
                                        <td class="txt-oflo">
                                            <h4 style="color: red">{{ $tab[$i]['tauxRemboursement'] }} % </h4>
                                        </td>
                                        <td class="text-center">
                                            <h5>
                                                {{ $tab[$i]['observation'] }}
                                            </h5>
                                        </td>
                                        <td class="text-center">
                                            @if ($tab[$i]['tauxRemboursement'] < 50)
                                                <a href="javascript:void(0)"
                                                    onclick="avertirAgent({{ Auth::user()->id }},{{ $tab[$i]['id'] }}, {{ $tab[$i]['tauxRemboursement'] }}, '{{ $tab[$i]['observation'] }}' )">
                                                    <img src="/images/message.png" alt="" width="30"
                                                        id="imgEvaluation{{ $tab[$i]['id'] }}" height="30">
                                                </a>
                                            @else
                                                <a>
                                                    <img src="/images/correct.png" alt="" width="30"
                                                        height="30">
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
