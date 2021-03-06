<form class="form p-3" enctype="multipart/form-data" wire:submit.prevent="send_email_contact">
    @csrf
    <div class="row">

        <div class="col-md-6">
            <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                    <label for="names">Nombres</label>
                </div>
                <div class="position-relative">
                    <input type="text" id="names" class="form-control" placeholder="Nombre" wire:model="names">
                    <div class="form-control-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                @error('names') <span class="error"><small>{{ $message }}</small></span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                    <label for="lastnames">Apellidos</label>
                </div>
                <div class="position-relative">
                    <input type="text" id="lastnames" class="form-control" placeholder="Nombre" wire:model="lastnames">
                    <div class="form-control-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                @error('lastnames') <span class="error"><small>{{ $message }}</small></span> @enderror
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                    <label for="case">Asunto</label>
                </div>
                <div class="position-relative">
                    <input type="text" id="case" class="form-control" placeholder="Asunto" wire:model="case">
                    <div class="form-control-icon">
                        <i class="fas fa-suitcase"></i>
                    </div>
                </div>
                @error('case') <span class="error"><small>{{ $message }}</small></span> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group mb-3">
                <textarea placeholder="Comentarios" class="form-control" rows="3" wire:model="comments"></textarea>
                @error('comments') <span class="error"><small>{{ $message }}</small></span> @enderror
            </div>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-1 mb-1">
            <div wire:loading wire:target="send_email_contact" class="text-center">
                <div class="spinner-border position-relative" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            &nbsp;
            Enviar
        </button>
    </div>
</form>