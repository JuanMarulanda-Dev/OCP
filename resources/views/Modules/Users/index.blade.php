@extends('Layout/main')

@section('css')

@endsection

@section('content')

<section class="section">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3><i data-feather="users" width="20"></i>&nbsp;Usuarios</h3>
                    <a href="{{ route("usuarios.create") }}"
                        class="btn icon icon-left btn-primary float-right"><i data-feather="user"></i> Nuevo Usuario</a>
                </div>
            </div>
        </div>
    </div>

    @livewire('index-user')

</section>

<div class="modal fade" id="confirmDeleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button onclick="Livewire.emit('destroy')" type="button" class="btn btn-danger btn-sm">Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>
        $(document).ready(() => {

            Livewire.on('ShowActionFinishedSuccess', (body, title) => {
                toastr.success(body, title)
            });

            Livewire.on('ShowActionFinishedError', (body, title) => {
                toastr.error(body, title)
            });

            Livewire.on('HiddeDeleteConfirmationModal', () => {
                $('#confirmDeleteUser').modal('hide')
            });

            Livewire.on('showConfirmActionDeleteUser', () => {
                $('#confirmDeleteUser').modal();
            });

        });

    </script>
    
@endpush
