@extends('Layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('login') }}">
                            <small>
                                <i class="fas fa-arrow-circle-left"></i>
                                Volver
                            </small>
                        </a>
                    </div>

                    <div class="text-center mb-4">
                        <img src="{{ asset("images/logo-azul.png") }}" height="55"
                            class='mb-4'>
                        <h4 class="font-weight-bolder">Restablecer Contraseña</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Correo electronico*</label>
                            <div class="position-relative">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo electronico" autocomplete="email" autofocus>
                                <div class="form-control-icon">
                                    <i class="far fa-user"></i>
                                </div>
                            </div>
                        </div>
                        @error('email') {{ $message }} @enderror
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary btn-block">
                                Enviar correo de restablecer
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
