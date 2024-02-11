@extends('base')
@section('link_head')
    <!-- Lien pour les caroussels  -->
    <link href="dist/css/caroussel.css" rel="stylesheet">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
@endsection

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style="">ANALYSE DES PERFORMANCES</h2>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">ACCUEIL</a>
                    </li>
                    <li class="breadcrumb-item active">ANALYSE DE PERFORMANCE</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="container-fluid text-center my-3">
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    @for ($i = 0; $i < $count; $i++)
                        @if ($i === 0)
                            <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                        @endif
                        <div class="col-md-3">
                            <div class="card card-body">
                                @php
                                    $date = \Carbon\Carbon::createFromFormat('Y-m', $monthTauxArray[$i]['mois'])->locale('fr_FR');
                                    $formattedMonth = ucfirst($date->isoFormat('MMMM YYYY'));
                                    
                                    $dateDebut = $date
                                        ->copy()
                                        ->startOfMonth()
                                        ->toDateString();
                                    
                                    $dateFin = $date
                                        ->copy()
                                        ->endOfMonth()
                                        ->toDateString();
                                @endphp
                                <h5 class="card-title" style="font-size: 25px;">{{ $formattedMonth }}</h5>
                                <p class="card-text">
                                    Durant le mois de {{ $formattedMonth }} <br> le taux de remboursement était de <br>
                                    <b>{{ $monthTauxArray[$i]['taux'] }}%</b>
                                </p>
                                <form class="details-form" action="{{ route('analyse-info') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="datedebut" value="{{ $dateDebut }}">
                                    <input type="hidden" name="datefin" value="{{ $dateFin }}">
                                    <button type="submit" class="btn btn-secondary voir-details-btn">Voir
                                        détails</button>
                                </form>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                    aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="row mx-auto my-auto">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-text">Informations </h3>
                    <hr>
                    <p style="font-size: 16px; text-align: justify;padding:10px">
                        <b>SR PADME</b> comprend une analyse de
                        performance des
                        remboursements qui fournit des
                        statistiques sur l'évolution des remboursements dans le système, facilitant ainsi la prise de
                        décision. Cette analyse permet d'avoir une vision globale de la situation des remboursements,
                        d'identifier d'éventuels problèmes ou tendances, et d'aider à prendre des décisions éclairées
                        pour améliorer l'efficacité du processus de remboursement.
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-text">Renseigner la période d'analyse </h3>
                    <hr>
                    <div class="alert alert-danger">
                        Renseigner une période d'analyse valide. Merci
                    </div>
                    <form action={{ route('analyse-info') }} method="POST" id="form-analyse">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="selectMonth">Date Début</label>
                                <input type="date" name="datedebut" id="" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="selectMonth">Date Fin</label>
                                <input type="date" name="datefin" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success"
                                    style="display: block;width:100%;margin-top:10px">Lancer l'analyse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script_footer')
    <script type='text/javascript'>
        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var voirDetailsBtns = document.querySelectorAll('.voir-details-btn');

            voirDetailsBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = btn.closest('.details-form');
                    form.submit();
                });
            });
        });
    </script>
@endsection
