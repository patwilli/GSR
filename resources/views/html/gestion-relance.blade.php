@extends('base')

{{-- @section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">GESTION RELANCE</h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a>
                    </li>
                    <li class="breadcrumb-item active">GESTION RELANCE</li>
                </ol>
            </div>
        </div>
    </div>
@endsection --}}

@section('contenu')
    <br>
    <div class="row">
        <!-- column -->
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h3 class="card-title">SR PADME envoi aujourd'hui</h3>
                                <h4 class="card-subtitle"> {{ $nbr_rappel }} SMS & MAIL de rappel.</h4>
                                <h4 class="card-subtitle"> {{ $nbr_paiement }} SMS & MAIL de paiement.</h4>
                                <a href="{{ route('relance') }}" class="btn btn-outline-success">Relancer encore</a>
                            </div>
                            <div class="ml-auto">
                                <h4 style="text-decoration: underline">Légende:</h4>
                                <h5 class="card-title"><img src="/images/correct.png" alt="" width="18"
                                        height="18"> envoyé</h5>
                                <h5 class="card-title"><img src="/images/pas-de-wifi.png" alt="" width="15"
                                        height="15"> échec d'envoie</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">INFORMATIONS SUR LE CLIENT</th>
                                    <th class="text-center">A PAYER</th>
                                    <th>SMS & MAIL</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                @foreach ($merged_echeance as $echeance)
                                    @if (in_array($echeance->codecredit, $tab_id_credit))
                                        <tr>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('infoCredit', ['idCredit' => $echeance->codecredit]) }}">{{ $echeance->codecredit }}</a>
                                            </td>
                                            <td class="text-center">
                                                {{ $echeance->credit->client->nom }}
                                                {{ $echeance->credit->client->prenom }}
                                                |
                                                {{ $echeance->credit->client->telephone }} |
                                                {{ $echeance->credit->client->email }}</td>
                                            @if ($echeance->dateEcheance == $date_today)
                                                <td class="text-center" style="color:red">
                                                    {{ $echeance->montant_echeance }}
                                                    FCFA</td>
                                            @endif
                                            @if ($echeance->dateEcheance == $deux_jours)
                                                <td class="text-center" style="color: steelblue">
                                                    {{ $echeance->montant_echeance }}
                                                    FCFA</td>
                                            @endif
                                            <td class="text-center">
                                                <img src="/images/pas-de-wifi.png" alt="" width="15"
                                                    height="15" id="statutRelanceSms{{ $echeance->codecredit }}">
                                                &nbsp;|&nbsp;
                                                <img src="/images/pas-de-wifi.png" alt="" width="15"
                                                    height="15" id="statutRelanceMail{{ $echeance->codecredit }}">
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div style="display:flex">
                        <div style="flex:1">
                            <h4 class="card-title" style="margin-top:10px">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">QUELQUES PREVISIONS</font>
                                </font>
                            </h4>
                        </div>
                        <div style="flex:1">
                            <input type="date" name="" id="inputDatePrev" class="form-control" width=""
                                onchange="prevoir()">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive" id="contenu_prevision">
                            <div style="width:70%;margin:50px auto;font-size:16px;">
                                Voir les crédits qui tombent en impayé
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(() => {
            axios
                .get("http://127.0.0.1:8000/SR-PADME-Verification des relances")
                .then((response) => {
                    // Gérer la réponse ici
                    console.log(response.data);
                    var data = response.data;
                    for (let i = 0; i < data.length; i++) {
                        var img = document.getElementById(
                            "statutRelanceMail" + data[i]["codecredit"]
                        );
                        if (data[i]["statut"] == "echec") {
                            img.src = "/images/pas-de-wifi.png";
                        } else {
                            img.src = "/images/correct.png";
                        }
                    }
                })
                .catch((error) => {
                    // Gérer les erreurs ici
                    console.error(error);
                });
        }, 1000);
    </script>
@endsection
