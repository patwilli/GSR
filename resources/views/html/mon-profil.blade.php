@extends('base')

@section('entete_contenu')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h2 class="text-themecolor" style=""><i class="fa fa-user-circle-o" style="color: rgb(84, 174, 84)"></i>
                PROFILS ET MESSAGES
            </h2>
        </div>
        <div class="ml-auto">
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('message') }}" class="btn btn-info">Messages</a>&nbsp;&nbsp;
            </div>
        </div>
        <div class="">
            <div class="d-flex justify-content-end align-items-center">
                <a href="#" class="btn btn-danger" onclick="logout()"><i
                        class="fa fa-sign-out"></i>&nbsp;&nbsp;Déconnexion</a>
            </div>
        </div>
    </div>
@endsection
@section('contenu')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="../assets/images/users/utilisateur.png" class="img-circle"
                            width="150">
                        <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>

                        <div class="row text-center justify-content-md-center">
                            <div class="col-8"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                    <font class="font-medium">{{ Auth::user()->email }}</font>
                                </a></div>
                        </div>
                        <h6 class="card-subtitle m-t-10">
                            @if ($profil_user == 1)
                                ADMINISTRATEUR
                            @endif
                            @if ($profil_user == 2)
                                CHEF AGENCE
                            @endif
                            @if ($profil_user == 3)
                                CHEF BUREAU
                            @endif
                            @if ($profil_user == 4)
                                OPERATIONNEL POLYVALENT
                            @endif
                        </h6>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    <form method="POST" action="{{ route('profil.updatePassword') }}"
                        class="form-horizontal form-material">
                        @csrf
                        <div class="form-group">
                            <label for="current_password" class="col-md-12">Mot de passe actuel</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" id="current_password"
                                    name="current_password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-md-12">Nouveau mot de passe</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" id="new_password"
                                    name="new_password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation" class="col-md-12">Confirmation du nouveau mot de
                                passe</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" id="new_password_confirmation"
                                    name="new_password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Mettre a jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
