<div class="card files">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <input type="file" class="d-none" accept="*" wire:model="">
                <div class="d-flex justify-content-between align-items-center rounded" style="background: #f7f7f7;">
                    <div>
                        <button class="rounded-circle border-0">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <span style="font-size: 1.5rem;">{{ $route_content }}</span>
                    </div>
                    <div>
                        <button class="btn btn-outline-primary" wire:click="">
                            <i class="fas fa-folder-plus"></i>
                            &nbsp;&nbsp;&nbsp;
                            Nueva Carpeta
                        </button>
                        <button class="btn btn-outline-primary" wire:click="">
                            <i class="fas fa-cloud-upload-alt"></i>
                            &nbsp;&nbsp;&nbsp;
                            Subir Archivo
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="files-sections">
                    <div class="container">
                        <div class="row">

                            @forelse ($project_content as $item)
                                <div class="col-lg-2">
                                    @include('Modules.Projects.item', [
                                        'name' => null,
                                        'icon' =>  null,
                                        
                                    ])
                                </div>
                            @empty
                                No hay nada de contenido
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>