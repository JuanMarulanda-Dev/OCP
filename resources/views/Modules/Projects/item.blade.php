<div class="section-project-item">

    <div wire:click="changePorjectFolder('{{ $path }}')" class="project-item d-flex flex-column justify-content-between align-items-center">
        <a download="{{ $name }}" class="d-none" target="_blank" href="#"></a>
        
        <span>
            <i class="{{ $icon }}"></i>
        </span>
        <span>{{ $name }}</span>
    </div>
    
    {{-- Menucontex --}}
    <div class="list-group dropdown-menu p-0 menucontext" role="menu" aria-labelledby="dropdownMenu">
        @if ($this->isFolderOrFile($name) == 1)
            
            <button type="button" class="list-group-item list-group-item-action">
                <i class="fas fa-link"></i>
                &nbsp;Copiar URL
            </button>
            <button type="button" class="list-group-item list-group-item-action">
                <i class="fas fa-cloud-download-alt"></i>
                &nbsp;Descargar
            </button>

        @endif

        <button wire:click="confirDeleteItem('{{ $path }}')" type="button" class="list-group-item list-group-item-action">
            <i class="fas fa-trash-alt text-danger"></i>
            &nbsp;Eliminar
        </button>
        
    </div>

</div>