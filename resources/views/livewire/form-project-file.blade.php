<div class="card files">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <input type="file" class="d-none" accept="*" wire:model="">
                <div class="d-flex justify-content-between align-items-center rounded" style="background: #f7f7f7;">
                    <div>
                        <button wire:click="rollbackProjectFolder" class="rounded-circle border-0" @if($route_content == "/") disabled @endif>
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <span style="font-size: 1.5rem;">{{ $route_content }}</span>
                    </div>
                    <div>
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createNewFolder">
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
                            <div wire:loading class="text-center">
                                <br>
                                <div class="spinner-border position-relative" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <div class="row" wire:loading.class="d-none">
                            @forelse ($project_content as $item)
                                <div class="col-lg-2">
                                    @php
                                        $name = explode('/', $item);
                                        $nameItem = $name[count($name) - 1];
                                    @endphp

                                    @include('Modules.Projects.item', [
                                        'name' => $nameItem,
                                        'icon' => $this->chooseIconForItem($nameItem),
                                        'path' => $item
                                    ])

                                </div>
                            @empty

                                <span class="text-center">No hay nada de contenido</span>

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirDeleteItem" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Elemento</h5>
            </div>
            <div class="modal-body">
                ¿Desea eliminar este elemento?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button onclick="Livewire.emit('destroyPath')" data-dismiss="modal" type="button" class="btn btn-danger btn-sm">Eliminar</button>
            </div>
        </div>
    </div>
</div>

</a>