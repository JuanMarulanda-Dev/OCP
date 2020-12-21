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
                        @php
                            $i = 0;
                        @endphp
                        @foreach($project_content as $project_item)
                            @if ($i <= 2)
                                <li class="list-group-item d-flex align-items-center overflow-hidden">
                                    <div>
                                        {{-- Validate cual icono se va a mostrar --}}
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <div>
                                        {{-- Funcion para obtener el nombre --}}
                                        {{ $project_item }}
                                    </div>
                                </li>
                                @php
                                    $i++;
                                @endphp
                            @else
                                @break;
                            @endif
                        @endforeach
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
