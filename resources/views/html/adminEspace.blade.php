    @extends('base')

    @section('entete_contenu')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h2 class="text-themecolor" style=""><i class="fa fa-user-circle-o" style="color: rgb(84, 174, 84)"></i>
                    GESTION DES UTILISATEURS
                </h2>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('profils_fonctionnalites') }}" class="btn btn-info">Profils et
                        fonctionnalités</a>
                </div>
            </div>
        </div>
    @endsection

    @section('contenu')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h2 class="card-title">{{ $nbr_users }} Utilisateurs</h2>
                            </div>
                            <div class="ml-auto w-50">
                                <input class="custom-select b-0" type="text" onkeyup="rechercherUtilisateur()"
                                    placeholder="Nom et Prénom (Recherche)" id="search">
                            </div>
                            <div class="ml-auto">
                                <select class="custom-select b-0" id="trierUsers" onchange="trierUtilisateur()">
                                    <option>Tous les utilisateurs </option>
                                    @foreach ($profils as $profil)
                                        <option value="{{ $profil->id }}">{{ $profil->intitule }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>NOM ET PRENOM</th>
                                    <th>LOGIN</th>
                                    <th>EMAIL</th>
                                    <th>AGENCE</th>
                                    <th>BUREAU</th>
                                    <th>BLOQUER</th>
                                    <th>PROFIL</th>
                                </tr>
                            </thead>
                            <tbody id="contenu">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td class="txt-oflo">{{ $user->name }}</td>
                                        <td class="txt-oflo">{{ $user->login }}</td>
                                        <td><span class="txt-oflo">{{ $user->email }}</span></td>
                                        <td><span class="txt-oflo"></span>{{ $user->agence->intitule }}</td>
                                        <td><span class="txt-oflo">{{ $user->bureau->intitule }}</span></td>
                                        <td class="align-middle text-center">
                                            <input type="checkbox" class=""
                                                onchange="bloquerUtilisateur({{ $user->id }})"
                                                @if ($user->bloque == 1) checked @endif>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form method="POST">
                                                @csrf
                                                <select class="custom-select b-0" id="form_select_{{ $user->id }}"
                                                    onchange="changerProfil({{ $user->id }})">
                                                    @foreach ($profils as $profil)
                                                        @if ($profil->id == $user->codeProfil)
                                                            <option value="{{ $profil->id }}" selected>
                                                                {{ $profil->intitule }}</option>
                                                        @else
                                                            <option value="{{ $profil->id }}">
                                                                {{ $profil->intitule }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection














    {{-- <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Les Mouvements Utilisateur sur le systeme</font>
                        </font>
                    </h4>
                </div>
                <ul class="feeds p-b-20">
                    <li>
                        <div class="bg-info"><i class="fa fa-envelope"></i></div>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> 4/125 Mails de rappel envoyés aujourd'hui .
                            </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">il y a 5 h</font>
                            </font>
                        </span>
                    </li>
                    <li>
                        <div class="bg-success"><i class="fa fa-rocket"></i></div>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">L'utilisateur AKIII Koram a ete boosté .</font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">il y a 2 heures</font>
                            </font>
                        </span>
                    </li>
                    <li>
                        <div class="bg-danger"><i class="fa fa-key"></i></div>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">L'utilisateur ZOPO laurelle à oublié son mot de
                                passe
                                .
                            </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">31 mai</font>
                            </font>
                        </span>
                    </li>
                    <li>
                        <div class="bg-danger"><i class="fa fa-key"></i></div>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">L'utilisateur SOSSA Borel a changé son mot de
                                passe.
                            </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">30 mai</font>
                            </font>
                        </span>
                    </li>
                    <li>
                        <div class="bg-warning"><i class="fa     fa-check-circle"></i>
                        </div>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Systeme mis à jour.
                            </font>
                        </font><span class="text-muted">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">27 mai</font>
                            </font>
                        </span>
                    </li>
                </ul>
            </div>
        </div> --}}
