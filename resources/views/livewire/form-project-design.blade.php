<form action="">
    
    <div>
        <a href="#" class="btn icon icon-left btn-outline-primary float-right"><i data-feather="edit"></i> Guardar Diseño</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="plantilla">Plantilla:</label>
            <select class="form-select" id="plantilla" wire:model="">
                @foreach ($templates as $template)
                    <option value="{{ $template->id }}" >{{ $template->template }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="content_type">Tipo de contenido:</label>
            <select class="form-select" id="content_type" wire:model="">
                <option selected>Tipo de contenido</option>
                @foreach ($content_types as $content_types)
                    <option value="{{ $content_types->id }}" >{{ $content_types->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="content">Contenido:</label>
            <select class="form-select" id="content" wire:model="">
                {{-- Imagenes de la ruta del proyecto --}}
                <option selected>Seleccionar...</option>
            </select>
        </div>
    </div>

</form>