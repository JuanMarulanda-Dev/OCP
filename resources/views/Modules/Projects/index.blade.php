@extends('Layout/main')

@section('css')

@endsection

@section('content')

<section class="section">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3><i class="fas fa-project-diagram"></i>&nbsp;Proyectos</h3>
                    @if (Auth::user()->user_rol_id == 1)
                        {{-- Administrador --}}
                        <a href="{{ route("proyectos.create") }}" class="btn icon icon-left btn-primary float-right">
                            <i class="fas fa-project-diagram"></i>
                            &nbsp;&nbsp;&nbsp;Nuevo Proyecto
                        </a>                        
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @livewire('index-project')

</section>

@endsection

@push('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    <script>
        $(document).ready(() => {

            @if(session()->has('body') && session()->has('title'))
                toastr.success("{{ session('body') }}", "{{ session('title') }}")
            @endif

        });

    </script>

@endpush
