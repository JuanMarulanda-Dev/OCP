@extends('Layout/main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
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
    <div class="card">
        <div class="card-body">
            @livewire('index-user')
        </div>
    </div>

</section>

<div class="modal fade" id="confirmDeleteUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
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

            let table = $('#tbl-users');
            table.DataTable({
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "info": "Total de resultados: _MAX_",
                    "infoEmpty": "Total de resultados: 0",
                    "infoPostFix": "",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "loadingRecords": "Cargando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "processing": "Procesando...",
                    "search": "",
                    "searchPlaceholder": "Buscar",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    //only works for built-in buttons, not for custom buttons
                    "buttons": {
                        "create": "Nuevo",
                        "edit": "Cambiar",
                        "remove": "Borrar",
                        "copy": "Copiar",
                        "csv": "fichero CSV",
                        "excel": "tabla Excel",
                        "pdf": "documento PDF",
                        "print": "Imprimir",
                        "colvis": "Visibilidad columnas",
                        "collection": "Colección",
                        "upload": "Seleccione fichero...."
                    },
                    "select": {
                        "rows": {
                            _: '%d filas seleccionadas',
                            0: 'clic fila para seleccionar',
                            1: 'una fila seleccionada'
                        }
                    }
                }
            });

            Livewire.on('reloadDataTableUsers', (idRow) => {
                // table.DataTable().destroy();
                // table.DataTable({
                //     "language": {
                //         "decimal": ",",
                //         "thousands": ".",
                //         "info": "Total de resultados: _MAX_",
                //         "infoEmpty": "Total de resultados: 0",
                //         "infoPostFix": "",
                //         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                //         "loadingRecords": "Cargando...",
                //         "lengthMenu": "Mostrar _MENU_ registros",
                //         "paginate": {
                //             "first": "Primero",
                //             "last": "Último",
                //             "next": "Siguiente",
                //             "previous": "Anterior"
                //         },
                //         "processing": "Procesando...",
                //         "search": "",
                //         "searchPlaceholder": "Buscar",
                //         "zeroRecords": "No se encontraron resultados",
                //         "emptyTable": "Ningún dato disponible en esta tabla",
                //         "aria": {
                //             "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                //             "sortDescending": ": Activar para ordenar la columna de manera descendente"
                //         },
                //         //only works for built-in buttons, not for custom buttons
                //         "buttons": {
                //             "create": "Nuevo",
                //             "edit": "Cambiar",
                //             "remove": "Borrar",
                //             "copy": "Copiar",
                //             "csv": "fichero CSV",
                //             "excel": "tabla Excel",
                //             "pdf": "documento PDF",
                //             "print": "Imprimir",
                //             "colvis": "Visibilidad columnas",
                //             "collection": "Colección",
                //             "upload": "Seleccione fichero...."
                //         },
                //         "select": {
                //             "rows": {
                //                 _: '%d filas seleccionadas',
                //                 0: 'clic fila para seleccionar',
                //                 1: 'una fila seleccionada'
                //             }
                //         }
                //     }            
                // });
                table.row($("tr[id=" + idRow + "]")).remove().draw(false);
            });

            Livewire.on('showConfirmActionDeleteUser', () => {
                $('#confirmDeleteUser').modal();
            });

        });

    </script>
    
@endpush
