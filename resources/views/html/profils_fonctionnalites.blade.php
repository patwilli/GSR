    @extends('base')

    @section('entete_contenu')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h2 class="text-themecolor" style=""><i class="fa fa-user-circle-o" style="color: rgb(84, 174, 84)"></i>
                    PROFILS & FONCTIONNALITES
                </h2>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    &nbsp;
                    <a href="{{ route('espaceAdmin') }}" class="btn btn-info">Gérer Utilisateurs</a>
                </div>
            </div>
        </div>
    @endsection

    @section('contenu')
        <div class="row">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-text" style="color: rgb(84, 174, 84);text-align:center">Profils</h2>
                        @foreach ($profils as $profil)
                            <button class="mb-2 mr-2 btn btn-secondary btn-block" id="btnprofil{{ $profil->id }}"
                                onclick="updateProfil({{ $profil->id }})">{{ $profil->intitule }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100" id="cadre">
                    <div class="card-body">
                        <div style="width:250px;margin:0px auto">
                            <img src="images/pat.png" alt="" width="100" height="100">
                        </div>
                        <div style="width:250px;margin:0px auto">
                            <h3 class="" style="color: rgb(84, 174, 84);">Selectionner un profil</h3>
                            <h4>pour en savoir plus</h4>
                        </div>

                    </div>
                    {{-- <div class="card-body">
                        <h2 class="card-text" style="color: rgb(84, 174, 84)">Fonctionnalités disponible</h2>
                        @foreach ($fonctionnalites as $fonctionnalite)
                            <h4 class="card-title"><input type="checkbox" name=""
                                    id="">&nbsp;&nbsp;{{ $fonctionnalite->intitule }}</h4>
                        @endforeach

                    </div> --}}
                </div>
            </div>
        </div>
    @endsection
