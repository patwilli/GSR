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
                <a href="{{ route('monProfil') }}" class="btn btn-info">Compte</a>&nbsp;&nbsp;
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
                    <div class="accordion" id="accordionExample">
                        <h5 class="card-title">Boite de reception</h5>
                        <div class="message-box">
                            <div class="message-widget message-scroll">
                                <!-- Message -->
                                @forelse ($mes_messages as $message)
                                    @if ($message->credit != 0)
                                        <a href="javascript:void(0)" data-toggle="collapse"
                                            data-target="#message{{ $message->id }}" aria-controls="{{ $message->id }}"
                                            id="headingOne">
                                            <div class="user-img">
                                                <span class="round">
                                                    @if ($message->profilExpediteur == 'ADMINISTRATEUR')
                                                        ADMIN
                                                    @endif
                                                    @if ($message->profilExpediteur == 'CHEF AGENCE')
                                                        CA
                                                    @endif
                                                    @if ($message->profilExpediteur == 'CHEF BUREAU')
                                                        CB
                                                    @endif
                                                    @if ($message->profilExpediteur == 'OPERATIONNEL POLYVALENT')
                                                        OP
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>{{ $message->expediteur }}</h5> <span class="">Demande de suivi
                                                    renforcé . . .
                                                    (Cliquez
                                                    pour en
                                                    savoir plus)
                                                </span>
                                                <span class="time">Envoyé le
                                                    {{ date('d/m/Y à H:i', strtotime($message->created_at)) }} </span>
                                            </div>
                                        </a>
                                        <div id="message{{ $message->id }}" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body" style="color:rgb(58, 47, 47)">
                                                Cher {{ Auth::user()->name }},<br>
                                                J'espère que vous allez bien. Je me permets de vous contacter concernant le
                                                suivi du
                                                <span class="label label-warning" style="font-size: 13px">CREDIT
                                                    N°{{ $message->credit }}</span><br>
                                                Comme vous le savez, ce crédit revêt une grande importance pour moi, et il
                                                est
                                                essentiel que nous assurions un suivi régulier et efficace. Je suis prêt à
                                                collaborer étroitement avec vous afin de faciliter le processus et de
                                                veiller à
                                                ce
                                                que le suivi de ce crédit se déroule de manière fluide et
                                                transparente.<br>Je
                                                vous
                                                remercie sincèrement de votre attention à ce message et de votre engagement
                                                à
                                                améliorer le suivi de ce crédit. J'ai hâte de remarquer des mises à jour
                                                régulières
                                                de votre part et de voir des progrès tangibles dans le traitement du credit
                                                N°
                                                {{ $message->credit }}.
                                            </div>
                                        </div>
                                    @else
                                        <!-- Message -->
                                        <a href="javascript:void(0)" data-toggle="collapse"
                                            data-target="#message{{ $message->id }}" aria-controls="{{ $message->id }}"
                                            id="headingTwo">
                                            <div class="user-img">
                                                <span class="round">
                                                    @if ($message->profilExpediteur == 'ADMINISTRATEUR')
                                                        ADMIN
                                                    @endif
                                                    @if ($message->profilExpediteur == 'CHEF AGENCE')
                                                        CA
                                                    @endif
                                                    @if ($message->profilExpediteur == 'CHEF BUREAU')
                                                        CB
                                                    @endif
                                                    @if ($message->profilExpediteur == 'OPERATIONNEL POLYVALENT')
                                                        OP
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>Mickael Jordan</h5> <span class="">Résultat d'évaluation . . .
                                                    (Cliquez
                                                    pour en
                                                    savoir plus)
                                                </span> <span class="time">Envoyé le
                                                    {{ date('d/m/y à H:i', strtotime($message->created_at)) }} </span>

                                            </div>
                                        </a>
                                        <div id="message{{ $message->id }}" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body" style="color:rgb(58, 47, 47)">
                                                Cher {{ Auth::user()->name }},
                                                <br>
                                                Je souhaiterais vous informer des conclusions de l'évaluation effectuée par
                                                notre
                                                systeme de suivi de remboursement SR PADME.
                                                <br>
                                                <span
                                                    style="text-decoration: underline;color:rgb(212, 53, 53)">{{ $message->message }}</span>
                                                <br>
                                                Merci.
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <p>Aucun message </p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    {{-- <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <h2>Boîte de réception</h2>
                <div class="card">
                    <div class="card-header d-flex" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" id="headingOne">
                        <h3 class="mb-0">
                            Neil Armonstrong
                            
                        </h3>
                        <span class="float-right ml-auto">{{ date('Y-m-d H:i:s') }}</span>
                    </div>
            
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
        
                <div class="card">
                    <div class="card-header d-flex" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo" id="headingTwo">
                        <h3 class="mb-0">
                            Mickael Jordan
                        </h3>
                        <span class="float-right ml-auto">{{ date('Y-m-d H:i:s') }}</span>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" >
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
        
                <div class="card">
                    <div class="card-header d-flex" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree" id="headingThree">
                        <h3 class="mb-0">
                            Elon Musk
                        </h3>
                        <span class="float-right ml-auto">{{ date('Y-m-d H:i:s') }}</span>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
                
    
                <div class="card">
                    <div class="card-header d-flex" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" id="headingFour">
                        <h3 class="mb-0">
                            Bill Gates
                        </h3>
                        <span class="float-right ml-auto">{{ date('Y-m-d H:i:s') }}</span>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex" data-toggle="collapse" data-target="#collapseFive" aria-controls="collapseFive" id="headingFive">
                        <h3 class="mb-0">
                            Jesus Gabriel
                        </h3>
                        <span class="float-right ml-auto">{{ date('Y-m-d H:i:s') }}</span>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
