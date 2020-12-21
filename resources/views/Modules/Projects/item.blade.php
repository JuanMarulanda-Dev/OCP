<div class="section-project-item">

    <div @if($isFolderOrFile == 0) wire:click="changePorjectFolder('{{ $path }}')" @else onclick="showFileInOtherWindow(this)" @endif class="project-item d-flex flex-column justify-content-between align-items-center">
        <a download="{{ $name }}" class="d-none" target="_blank" @if($isFolderOrFile == 1) href="{{ env('AWS_URL_BUCKET').$path }}" @endif></a>
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
            
            <button type="button" class="list-group-item list-group-item-action copyFileUrl">
                <i class="fas fa-link"></i>
                &nbsp;Copiar URL
            </button>
            <button wire:click="downloadFile('{{ $path }}')" type="button" class="list-group-item list-group-item-action">
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