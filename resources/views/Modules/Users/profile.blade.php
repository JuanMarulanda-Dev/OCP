@extends('Layout/main')

@section('css')
    
@endsection

@section('content')

    <section class="section">

        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("usuarios.index") }}">
                            <i class="fas fa-arrow-circle-left"></i>
                            <h3 class="">&nbsp;Mi Perfil</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">

                @livewire('form-user', ['user' => Auth::user(), 'profile' => 1])

            </div>
        </div>

    </section>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endpush

@push('listeners')
        Livewire.on('ShowActionFinishedSuccess', (body, title) => {
            toastr.success(body, title)
        });

        Livewire.on('ShowProfileImage', () => {
            $("#image").click();
        });

@endpush
