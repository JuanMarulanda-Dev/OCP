@extends('Layout/main')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
@endsection

@section('content')

<section class="section">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3><i data-feather="users" width="20"></i>&nbsp;Usuarios</h3>
                    <a href="{{ route("usuarios.create") }}" class="btn icon icon-left btn-primary float-right"><i data-feather="user"></i> Nuevo Usuario</a>
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
@endsection

@push('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
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
                                    "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
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
        });
    </script>
    {{-- <script src="{{asset("vendors/simple-datatables/simple-datatables.js")}}"></script>
    <script src="{{asset("js/vendors.js")}}"></script> --}}
@endpush