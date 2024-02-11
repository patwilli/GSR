<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>SR PADME</title>
    <!-- Lien pour les caroussels  -->
    <link href="dist/css/caroussel.css" rel="stylesheet">
    <!-- Elegant -->
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="../assets/images/sr1.png">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="dist/css/boite_diag.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('link_head')
    @yield('script_head')
</head>

<body class="skin-default-dark fixed-layout" id="body">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">chargement . . .</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div style="margin-left: 75px">
                    <a class="navbar-brand" href="/">
                        <b>
                            <img src="../assets/images/sr-padme3.png" alt="padme" class="" width="180"
                                height="65" />
                        </b>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li> --}}
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li id="typing-text" style="padding-top: 15px;text-align: center;">
                            <a href="{{ route('monProfil') }}"><b style="color: rgb(84, 174, 84)">
                                    {{ Auth::user()->name }}
                                </b><br>
                                @if ($profil_user == 1)
                                    <i style="color:black">Administrateur</i>
                                @endif
                                @if ($profil_user == 2)
                                    <i style="color:black">
                                        {{-- <marquee behavior="" direction="">Nouveau message</marquee> --}}
                                        Chef Agence
                                    </i>
                                @endif
                                @if ($profil_user == 3)
                                    <i style="color:black">Chef Bureau</i>
                                @endif
                                @if ($profil_user == 4)
                                    <i style="color:black">Operationnel Polyvalent</i>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                                href="{{ route('monProfil') }}">
                                <img class="" src="../assets/images/users/utilisateur.png" alt="user"
                                    class="img-circle" width="30">
                                <span class="profile-status offline pull-right"></span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <h1 style="color: rgb(84, 174, 84)">SR PADME</h1>
                <a class="waves-effect waveds-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">


                        <li> <a class="waves-effect waves-dark" href="{{ route('index') }}" aria-expanded="false"><i
                                    class="fa fa-home"></i><span class="hide-menu">Accueil</span></a></li>


                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 1)
                                <li> <a class="waves-effect waves-dark" href="{{ route('listesCredits') }}"
                                        aria-expanded="false"><i class="fa fa-table"></i><span
                                            class="hide-menu"></span>Crédits</a></li>
                            @endif
                        @endforeach

                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 4)
                                <li> <a class="waves-effect waves-dark" href="{{ route('rapportEnCours') }}"
                                        aria-expanded="false"><i class="fa fa-file"></i><span
                                            class="hide-menu"></span>Rapport des prêts en cours</a></li>
                            @endif
                        @endforeach


                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 6)
                                <li> <a class="waves-effect waves-dark" href="{{ route('analyse-remboursement') }}"
                                        aria-expanded="false"><i class="fa fa-bar-chart"></i><span
                                            class="hide-menu"></span>Analyses de
                                        performances</a></li>
                            @endif
                        @endforeach

                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 7)
                                <li> <a class="waves-effect waves-dark" href="{{ route('surbordonneH') }}"
                                        aria-expanded="false"><i class="fa fa-sitemap"></i>
                                        <span class="hide-menu"></span>Evaluation des Subordonnés</a></li>
                            @endif
                        @endforeach

                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 3)
                                <li> <a class="waves-effect waves-dark" href="{{ route('relance') }}"
                                        aria-expanded="false"><i class="fa fa-calendar"></i><span
                                            class="hide-menu"></span>
                                        Relances</a>
                                </li>
                            @endif
                        @endforeach

                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 9)
                                <li> <a class="waves-effect waves-dark" href="{{ route('espaceAdmin') }}"
                                        aria-expanded="false"><i class="fa fa-shield"></i>
                                        <span class="hide-menu"></span>Espace administrateur</a></li>
                            @endif
                        @endforeach

                        @foreach ($mes_fonctionnalites as $fonct)
                            @if ($fonct == 10)
                                <li> <a class="waves-effect waves-dark" href="{{ route('monProfil') }}"
                                        aria-expanded="false"><i class="fa fa-user-circle-o"></i><span
                                            class="hide-menu">Mon
                                            Profil</span></a></li>
                            @endif
                        @endforeach


                        <li> <a class="waves-effect waves-dark" href="#" onclick="logout()"
                                aria-expanded="false"><i class="fa fa-sign-out"></i><span
                                    class="hide-menu"></span>Déconnexion</a></li>

                        <div class="text-center m-t-30">
                        </div>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('entete_contenu')
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('contenu')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2023 Systeme de suivi des remboursements
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="dist/js/axios.js"></script>
    <script src="dist/js/fonctions.js"></script>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    {{-- <script>
        setInterval(() => {
            notifierMsg({{ Auth::user()->id }})
        }, 1000);
    </script> --}}
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <!-- Caroussel sur page analyse de remboursement -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    @yield('script_footer')
</body>

</html>
