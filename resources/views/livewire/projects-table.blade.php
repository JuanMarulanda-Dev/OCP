<div>
    <div class="container mt-4">
        {{-- Esto se deberia comvertir en un componenete --}}
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <label>Filtrar proyectos</label>
            </div>
            <div class="col-sm-12 col-md-10">
                <div class="form-group position-relative has-icon-right">
                    <div id="project-filter" class="position-relative">
                        <input type="text" class="form-control" placeholder="Nombre" wire:model="filter_field">
                        <div class="form-control-icon">
                            <i class="fas fa-search" style="line-height: unset;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="projects-table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Fecha limite</th>
                    <th scope="col">Asignado</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->name }}</th>
                        <td>{{ $project->first_date }}</td>
                        <td>{{ $project->last_date }}</td>
                        <td class="d-flex justify-content-center">
                            <div class='form-check'>
                                <div class="checkbox">
                                    <input type="checkbox" class='form-check-input' checked>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="text-center">
                                No Hay ningun proyecto
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="float-right">
            {{ $projects->links() }}
        </div>
    </div>

    <div class="col-12 d-flex justify-content-end">
        <button wire:click="" type="reset" class="btn btn-light-secondary mr-1 mb-1">Cancelar</button>
        <button type="submit" class="btn btn-primary mr-1 mb-1">
            <div wire:loading wire:target="" class="text-center">
                <div class="spinner-border position-relative" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            &nbsp;
            Guardar Cambios
        </button>
    </div>

</div>
