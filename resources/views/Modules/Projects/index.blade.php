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
                    <a href="{{ route("proyectos.create") }}"
                        class="btn icon icon-left btn-primary float-right"><i class="fas fa-project-diagram"></i>&nbsp;&nbsp;&nbsp;Nuevo Proyecto</a>
                </div>
            </div>
        </div>
    </div>
    @livewire('index-project')

</section>

<div class="modal fade" id="confirmDeleteProject" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="destroy" type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    <script>
        $(document).ready(() => {

            Livewire.on('showConfirmActionDeleteUser', () => {
                $('#confirmDeleteProject').modal();
            });

        });

    </script>

@endpush
