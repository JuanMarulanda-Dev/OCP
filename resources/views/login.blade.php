<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - {{ env("APP_NAME") }}</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="shortcut icon" href="{{asset("images/favicon.ico")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset("css/app-vero.css") }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
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
    {{-- Content --}}
    <div id="auth" class="d-none">
        <div>
            <@livewire('login')
        </div>
    </div>
    <script src="{{ asset("js/feather-icons/feather.min.js") }}"></script>
    <script src="{{ asset("js/app-vero.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset("js/tostr_config.js") }}"></script>
    <script>
        window.addEventListener('load', () => {
    
            cargar();
    
            function cargar(){
                document.getElementById('auth').className = '';
    
                document.getElementById('loader').className = 'd-none';
            }

            // 
            Livewire.on('ShowAlertDangerUserNotFound', (title, body) => 
                toastr.warning(body, title)
            )

            Livewire.on('ShowLoaderActionLogin', () => {
                $('#spinner').removeClass("d-none");
                console.log(1);
            })

            Livewire.on('HiddeLoaderActionLogin', () => 
                $('#spinner').addClass("d-none")
            )

        });
    </script>
    @livewireScripts

</body>

</html>
