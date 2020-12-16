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
                    <form action="">

                        <div>
                            <a href="#" class="btn icon icon-left btn-outline-primary float-right"><i data-feather="edit"></i> Guardar Diseño</a>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="plantilla">Plantilla:</label>
                                <select class="form-select" id="plantilla" wire:model="">
                                    <option selected>Seleccionar...</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="content_type">Tipo de contenido:</label>
                                <select class="form-select" id="content_type" wire:model="">
                                    <option selected>Seleccionar...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="content">Contenido:</label>
                                <select class="form-select" id="content" wire:model="">
                                    <option selected>Seleccionar...</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
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
