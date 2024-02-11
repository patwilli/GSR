@extends('base')

@section('link_head')
    <style>
        .chart-container {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('script_head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            {{-- <h2 class="text-themecolor" style="">REMBOURSEMENT DE <span style="font-weight: bold">MAI</span></h2> --}}
            <h2 class="text-themecolor" style="">DU <span
                    style="font-weight: bold">{{ \Carbon\Carbon::parse($dateDebut)->format('d/m/Y') }}</span> AU
                <span style="font-weight: bold">{{ \Carbon\Carbon::parse($dateFin)->format('d/m/Y') }}</span>
            </h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('analyse-remboursement') }}">FORMULAIRE D'ANALYSE</a>
                    </li>
                    <li class="breadcrumb-item active">RESULTATS D'ANALYSE</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3 align='center'>QUELQUES STATISTIQUES</h3>
                    <hr>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Nombre de crédit contracté sur cette periode: </h4>
                        <span style="font-size: 15px;flex:1">&nbsp; {{ $nbr_de_credit }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Montant total debourcé : </h4>
                        <span style="font-size: 15px;flex:1">&nbsp; {{ $montant_total_debourse }} fcfa</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Nombre d'écheance Soldé : </h4>
                        <span style="font-size: 15px;flex:1;color:rgb(106, 0, 255);font-weigth:bold">&nbsp;
                            {{ $echeanceSolde }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Nombre d'écheance Non Soldé : </h4>
                        <span style="font-size: 15px;flex:1;color:red;font-weigth:bold">&nbsp;
                            {{ $echeanceNonSolde }}</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Montant total écheance payé: </h4>
                        <span style="font-size: 15px;flex:1;font-weigth:bold">&nbsp;
                            {{ $mtn_echeance_paye }} fcfa</span>
                    </div>
                    <div style="display: flex;">
                        <h4 class="card-title" style="flex:2">Montant total écheance : </h4>
                        <span style="font-size: 15px;flex:1;font-weigth:bold">&nbsp;
                            {{ $mtn_echeance }} fcfa</span>
                    </div>
                    <br>
                    <h3 align="center">TAUX DE REMBOURSEMENT</h3>
                    <div class="w-auto" style="text-align:center;font-size:65px">{{ $grandTaux }}%</div>
                    {{-- <h5 align="center"><button class="btn btn-outline-secondary">Détails par jours</button></h5> --}}
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card ">
                <div class="card-body">
                    <h3 align='center'>DETAILS PAR JOURS</h3>
                    <hr>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script_footer')
    <script src="dist/js/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        // Définir la date de début et de fin
        var startDate = '{{ $dateDebut }}';
        var endDate = '{{ $dateFin }}';
        startDate = new Date(startDate);
        endDate = new Date(endDate);


        // Tableau pour stocker les labels
        var labels = [];
        var mesDatas = [];
        @foreach ($datesTauxArray as $item)
            mesDatas.push({
                date: '{{ $item['date'] }}',
                taux: {{ $item['taux'] }}
            });
        @endforeach

        // Boucle pour générer les dates et les ajouter au tableau
        var currentDate = startDate;
        while (currentDate <= endDate) {
            // Formater la date au format souhaité (dd/mm/yyyy)
            var formattedDate = currentDate.toLocaleDateString('fr-FR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });

            // Ajouter la date au tableau des labels
            labels.push(formattedDate);

            // Passer à la prochaine date
            currentDate.setDate(currentDate.getDate() + 1);
        }

        // Afficher les labels dans la console (pour vérification)
        console.log(labels);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Taux de remboursement',
                    data: mesDatas.map(item => item.taux), // Utiliser les taux du tableau mesDatas
                    borderWidth: 1,
                    borderColor: 'blue'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                    }
                }
            }
        });
    </script>
@endsection
