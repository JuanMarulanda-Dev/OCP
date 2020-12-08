<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - {{ env("APP_NAME") }}</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="shortcut icon" href="{{asset("images/favicon.ico")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset("css/app-vero.css") }}">
    <link rel="stylesheet" href="{{asset("vendors/chartjs/Chart.min.css")}}">

    <link rel="stylesheet" href="{{asset("vendors/perfect-scrollbar/perfect-scrollbar.css")}}">
    @livewireStyles
</head>

<body>

    <!-- Louder pages -->
    <div class="center" id="loader">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="spinner-border" style="width: 8rem; height: 8rem; color: #003161" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div id="app" class="d-none">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header"></div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class='sidebar-title'>Menu Principal</li>

                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Proyectos</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Mi perfil</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.html" class='sidebar-link'>
                                <i data-feather="phone" width="20"></i>
                                <span>Contacto</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light sticky-top">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li>
                            <h6>Administrador</h6>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Juan David</div>
                                <div class="avatar mr-1">
                                    <img src="{{asset("images/avatar/avatar-s-1.png")}}" alt="" srcset="">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Mi perfil</a>
                                <a class="dropdown-item" href="#"><i data-feather="mail"></i> Mis proyectos</a>
                                <div class="dropdown-divider"></div>
                                @livewire('logout')
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-left">
                <p>2020 &copy; Voler</p>
            </div>
            <div class="float-right">
                <p>Development Made With <span class='text-danger'><i data-feather="heart"></i></span> by <a
                        href="http://ahmadsaugi.com">Juan David M</a></p>
            </div>
        </div>
    </footer>

    <script src="{{asset("js/feather-icons/feather.min.js")}}"></script>
    <script src="{{asset("vendors/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>

    {{-- <script src="{{asset("vendors/chartjs/Chart.min.js")}}"></script> --}}
    <script src="{{asset("vendors/apexcharts/apexcharts.min.js")}}"></script>
    {{-- <script src="{{asset("js/pages/dashboard.js")}}"></script> --}}

    <script src="{{asset("/js/main.js")}}"></script>
    
    @stack('scripts')

    <script>
        window.addEventListener('load', () => {
    
            cargar();
    
            function cargar(){
                document.getElementById('app').className = '';
    
                document.getElementById('loader').className = 'd-none';
            }

            Livewire.on('ShowLoaderPage', () => 
                $('#app').addClass("d-none")
            )
    
        });
    </script>
    @livewireScripts

</body>

</html>
