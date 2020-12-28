<div class="card text-decoration-none">
    <div class="card-body">
        <div class="fields">
            <div class="row">
                <div class="col-md-12">
                    <h4>Archivos</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="list-group list-group-flush">

                        @forelse($porject_files as $porject_file)
                            <li class="list-group-item d-flex align-items-center overflow-hidden">
                                <div>
                                    {{-- Validate cual icono se va a mostrar --}}
                                    <i class="fas fa-folder"></i>
                                </div>
                                <div>
                                    {{-- Funcion para obtener el nombre --}}
                                    {{ $porject_file }}
                                </div>
                            </li>
                        @empty
                            
                            No hay archivos

                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" id="seemore" class="nav-link float-right">Ver más...</a>
                </div>
            </div>
        </div>
    </div>
</div>