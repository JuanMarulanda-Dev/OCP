<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <label>Filtrar proyectos</label>
                </div>
                <div class="col-sm-12 col-md-10">
                    <div class="form-group position-relative has-icon-right">
                        <div id="project-filter" class="position-relative">
                            <input type="text" class="form-control" placeholder="Nombre" wire:model="filter_field">
                            {{-- <span>{{ $projects }}</span> --}}
                            <div class="form-control-icon">
                                <i class="fas fa-search" style="line-height: unset;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row projects-section">
    
        @forelse($projects as $project)
        
            <div class="col-lg-6 col-md-12">
                @livewire('project-card', ['project' => $project], key($project->id))
            </div>
    
        @empty
    
            <div class="text-center">
                No hay proyectos
            </div>
    
        @endforelse
    
        <div class="row d-flex justify-content-center">
            <span>
                {{ $projects->links() }}
            </span>
        </div>
    
    </div>
</div>
