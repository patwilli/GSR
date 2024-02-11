@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">RAPPORT DES PRETS EN COURS</h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a>
                    </li>
                    <li class="breadcrumb-item active">RAPPORT DES PRETS EN COURS</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <div>
        <form id="formrapport" onsubmit="rapportSearch()">
            <input style="border: none;border-radius:2px;padding:8px" type="text" placeholder="ID CREDIT"
                id="searchrapport">
            <input type="submit" value="Trouver"
                style="border: none;border-radius:2px;padding:7px;color:white;font-weight:bold;background:rgb(162, 154, 139)">
        </form>
    </div>
    <hr>
    <div style="display: flex; flex-wrap:wrap">
        @foreach ($credits as $credit)
            <div class="card w-25" style="margin: 5px;" id="credit{{ $credit->id }}">
                <div class="card-body" style="display: flex">
                    <img src="../assets/images/pdf.png" id="img{{ $credit->id }}" alt="pdficon" width="90"
                        height="80" />
                    <div>
                        <h3 class="card-text" style="color: rgb(84, 174, 84)">CREDIT N°{{ $credit->id }}</h3>
                        <h6> <i>{{ $credit->client->nom }} {{ $credit->client->prenom }} </i></h6>
                        <h5 style="color: black">{{ $credit->montantAccorde }} FCFA</h5>
                    </div>
                </div>
                <button class="btn waves-effect waves-light btn-success hidden-md-down"
                    {{ $mes_fonctionnalites->contains(5) ? '' : 'disabled' }}>
                    <a href="{{ route('pdf', ['idCredit' => $credit->id]) }}" style="color: white">
                        <i class="fa fa-download">&nbsp;</i>Télécharger
                    </a>
                </button>
            </div>
        @endforeach
    </div>






































    {{-- 
<div class="container">
    <h1>Analyse des Performances de Remboursement</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">Taux de Remboursement Mensuel</h5>
                    <canvas id="monthlyRepaymentChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">Taux de Remboursement Annuel</h5>
                    <canvas id="yearlyRepaymentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card w-25">
                <div class="card-body">
                    <h5 class="card-title">Performance Globale de Remboursement</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Année</th>
                                <th>Taux de Remboursement</th>
                                <th>Montant Remboursé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2021</td>
                                <td>85%</td>
                                <td>$500,000</td>
                            </tr>
                            <tr>
                                <td>2022</td>
                                <td>92%</td>
                                <td>$600,000</td>
                            </tr>
                            <tr>
                                <td>2023</td>
                                <td>78%</td>
                                <td>$400,000</td>
                            </tr>
                            <!-- Ajoutez d'autres données de performance ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Code pour générer les graphiques avec Chart.js
    $(document).ready(function() {
        // Données factices pour les graphiques
        var monthlyData = {
            labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
            datasets: [{
                label: "Taux de Remboursement",
                data: [85, 78, 92, 80, 88, 75, 90, 82, 87, 79, 85, 88],
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            }]
        };

        var yearlyData = {
            labels: ["2017", "2018", "2019", "2020", "2021", "2022", "2023"],
            datasets: [{
                label: "Taux de Remboursement",
                data: [75, 80, 85, 82, 85, 92, 78],
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        };

        // Création des graphiques
        var monthlyCtx = document.getElementById('monthlyRepaymentChart').getContext('2d');
        var monthlyChart = new Chart(monthlyCtx, {
            type: 'line',
            data: monthlyData
        });

        var yearlyCtx = document.getElementById('yearlyRepaymentChart').getContext('2d');
        var yearlyChart = new Chart(yearlyCtx, {
            type: 'bar',
            data: yearlyData
        });
    });
</script> --}}
@endsection
