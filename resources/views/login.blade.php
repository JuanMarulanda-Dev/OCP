<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - {{ env("APP_NAME") }}</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset("css/app-vero.css") }}">
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
    {{-- Content --}}
    <div id="auth" class="d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div>
                                <a href="#">
                                    <small>
                                        <i data-feather="arrow-left"></i>
                                        Volver a la web
                                    </small>
                                </a>
                            </div>
                            <div class="text-center mb-5">
                                <img src="{{ asset("images/logo-azul.png") }}" height="55"
                                    class='mb-4'>
                                <h4 class="font-weight-bolder">Bienvenido</h4>
                                <p>Completa el formulario para ingresar a tu cuenta</p>
                            </div>
                            <form action="{{route('home')}}" method="GET">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Correo electronico*</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Contraseña*</label>
                                        <a href="auth-forgot-password.html" class='float-right'>
                                            <small>¿Olvido su contraseña?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary btn-block">Ingresar</button>
                                </div>
                                <div class='text-center mt-3'>
                                    <a href="#">
                                        <small>Terminos y condiciones</small>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("js/feather-icons/feather.min.js") }}"></script>
    <script src="{{ asset("js/app-vero.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
    <script>
        window.addEventListener('load', () => {
    
            cargar();
    
            function cargar(){
                document.getElementById('auth').className = '';
    
                document.getElementById('loader').className = 'd-none';
            }
    
        });
    </script>
</body>

</html>
