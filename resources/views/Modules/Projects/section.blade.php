<section class="section">
    
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("usuarios.index") }}">
                        <i class="fas fa-arrow-circle-left"></i>
                        <h3 class="">&nbsp;Proyectos</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#user-form" role="tab"
                        aria-controls="home" aria-selected="true">Detalles del proyecto</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#projects" role="tab"
                        aria-controls="profile" aria-selected="false">Archivos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="user-form" role="tabpanel" aria-labelledby="home-tab">

                    @livewire('form-project', ['project' => $project])

                </div>
                <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="home-tab">
                    Esta no se va a mostrar por el momento.
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h4>Diseño</h4>
                    <button class="add-design" type="button" data-toggle="collapse" data-target="#FormCollapseDesign" 
                    aria-expanded="false" aria-controls="FormCollapseDesign">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
    
            <div class="row">
                <div class="collapse" id="FormCollapseDesign">
                    <br>
                    <div class="card card-body">
                        
                        @livewire('form-project-design', [
                            'templates' => $templates,
                            'content_types' => $content_types,
                        ]);

                    </div>
                </div>
            </div>
    
            <div class="row">
                {{-- convertir esto en un componente --}}
                <div class="table-responsive">
                    <table class="table mb-0" id="tbl-project-design">
                        <thead class="thead-dark">
                            <tr>
                                <th>Posición</th>
                                <th>Plantilla</th>
                                <th>Contenido</th>
                                <th>Habilitado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Michael Right</td>
                                <td>$15/hr</td>
                                <td>UI/UX</td>
                                <td>
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" class='form-check-input' checked>
                                        </div>
                                    </div>
                                </td>
                                <td>Austin,Taxes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
