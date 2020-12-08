<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="#">
                            <small>
                                <i data-feather="arrow-left"></i>
                                Volver a la web
                            </small>
                        </a>
                    </div>
                    <div class="text-center mb-4">
                        <img src="{{ asset("images/logo-azul.png") }}" height="55"
                            class='mb-4'>
                        <h4 class="font-weight-bolder">Bienvenido</h4>
                        <p>Completa el formulario para ingresar a tu cuenta</p>
                        
                        @if ($errors->any())
                            <div class="alert alert-light-danger color-danger text-wrap text-left alert-dismissible show fade m-0">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <form wire:submit.prevent="submit_login">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Correo electronico*</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" wire:model="email">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Contraseña*</label>
                                @if (Route::has('password.request'))
                                    <a href="auth-forgot-password.html" class='float-right'>
                                        <small>¿Olvido su contraseña?</small>
                                    </a>
                                @endif
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" wire:model="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar
                                <div id="spinner" class="spinner-border text-light d-none" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
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
