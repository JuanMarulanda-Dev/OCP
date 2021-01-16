<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ env('WEB_SITE', 'url') }}">
                            <small>
                                <i class="fas fa-arrow-circle-left"></i>
                                {{ __('login.goBackToWeb') }}
                            </small>
                        </a>
                    </div>
                    <div class="text-center mb-4">
                        <img src="{{ asset("images/logo-azul.png") }}" height="55"
                            class='mb-4'>
                        <h4 class="font-weight-bolder">{{ __('login.welcome') }}</h4>
                        <p>{{ __('login.completeInfo') }}</p>
                        
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
                            <label for="email">{{ __('login.email') }}*</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" wire:model="email">
                                <div class="form-control-icon">
                                    <i class="far fa-user"></i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">{{ __('login.password') }}*</label>
                                @if (Route::has('password.request'))
                                {{-- Pending --}}
                                    <a href="{{ route('password.request') }}" class='float-right'>
                                        <small>{{ __('login.forgotYourPassword') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" wire:model="password">
                                <div class="form-control-icon">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('login.signIn') }}
                                <div wire:target="submit_login" wire:loading class="text-center float-right">
                                    <div class="spinner-border position-relative" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class='text-center mt-3'>
                            @if (Route::has('terms'))
                                <a href="{{ route('terms') }}">
                                    <small>Terminos y condiciones</small>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
