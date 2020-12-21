<div class="section-project-item">

    <div wire:click="changePorjectFolder('{{ $path }}')" class="project-item d-flex flex-column justify-content-between align-items-center">
        <a download="{{ $name }}" class="d-none" target="_blank" href="#"></a>
        
        <span>
            @if ($isFolderOrFile == 1)
            <img class="project-img-size rounded" src="{{ env('AWS_URL_BUCKET').$path }}" alt="project-image">
            @else
                <i class="{{ $this->chooseIconForItem($name) }}"></i>
            @endif
        </span>
        <span>{{ $name }}</span>

    </div>
    
    {{-- Menucontex --}}

    <div class="list-group p-0 dropdown-menu menucontext" role="menu" aria-hidden="true" data-keyboard="false" tabindex="-1"
    style="opacity: 0;">
        @if ($isFolderOrFile == 1)
            
            <button type="button" wire:click="typemousedown(this)" class="list-group-item list-group-item-action">
                <i class="fas fa-link"></i>
                &nbsp;Copiar URL
            </button>
            <button type="button" class="list-group-item list-group-item-action">
                <i class="fas fa-cloud-download-alt"></i>
                &nbsp;Descargar
            </button>

        @endif

        <button type="button" class="list-group-item list-group-item-action showDeleteConfirmation" data-path="{{ $path }}">
            <i class="fas fa-trash-alt text-danger"></i>
            &nbsp;Eliminar
        </button>
        
    </div>

</div>