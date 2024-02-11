<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .entete img {
            width: 100%;
            height: 100%;
        }

        h1 {
            text-align: center;
        }

        .renseig {
            width: 100%;
        }

        .sign {
            width: 100%;
            margin: 200px 0px 0px 120px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }

        .table th,
        .table td {
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    {{-- <div class="entete">
        <img src="/images/headpadme.jpg" alt="error ">
    </div> --}}
    <h1>RAPPORT DU CREDIT N°{{ $un_credit->id }}</h1>
    <hr>
    <div>
        <table class="renseig">
            <tr>
                <td><b>Bureau : </b>{{ $un_credit->bureau->intitule }}</td>
                <td><b>Déboursé le :
                    </b>{{ \Carbon\Carbon::parse($un_credit->dateDeboursement)->format('d/m/Y') }}</td>
            </tr>
            <tr></tr>
            <tr>
                <td><b>Client : </b> &nbsp;&nbsp; {{ $un_credit->client->nom }}&nbsp;{{ $un_credit->client->prenom }}
                </td>
                <td><b>Premiere écheancier : </b>{{ \Carbon\Carbon::parse($un_credit->dateInitiale)->format('d/m/Y') }}
                </td>
            </tr>
            <tr>
                <td><b>Telephone : </b>+229 &nbsp; {{ $un_credit->client->telephone }}</td>
                <td><b>Derniere écheancier :
                    </b>{{ \Carbon\Carbon::parse($un_credit->derniereEcheance)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><b>Email : </b>{{ $un_credit->client->email }}</td>
                <td><b>Type : </b>
                </td>
            </tr>
            <tr>
                <td><b>Montant capital du prêt : {{ $un_credit->montantAccorde }}</b> FCFA</td>
                <td>{{ $un_credit->produit->libelle }}</td>
            </tr>
            <tr></tr>
            <tr>
                <td><b>Secteur d'activité : </b>Motorboat Operator</td>
                <td></td>
            </tr>
            <tr>
                <td><b>Adresse : </b>
                    {{ $un_credit->client->adresse }}
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td><b>Objet du prêt: </b>
                    {{ $un_credit->objetCredit }}
                </td>
                <td>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <h4 align='center'>Echéancier</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Ech n°</th>
                    <th>Date échéance</th>
                    <th>Retard</th>
                    <th>Montant écheance </th>
                    <th>Montant payé </th>
                    <th>Date paiement </th>
                    <th>Etats</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($echeanciers as $echeancier)
                    <tr>
                        <td>{{ $echeancier->numero_echeance }}</td>
                        <td>{{ \Carbon\Carbon::parse($echeancier->dateEcheance)->format('d/m/Y') }}</td>
                        <td>{{ $echeancier->nombre_jour_retard }} jours</td>
                        <td>{{ $echeancier->montant_echeance }} F</td>
                        <td>{{ $echeancier->montant_paye }} F</td>
                        <td>{{ \Carbon\Carbon::parse($echeancier->date_paiement)->format('d/m/Y') }}</td>
                        <td>{{ $echeancier->etat_echeance }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <table class="sign">
            <tr>
                <td>{{ $un_credit->client->prenom }}&nbsp;{{ $un_credit->client->nom }}</td>
                <td>Le Responsable</td>
            </tr>
        </table>
    </div>

</body>

</html>
