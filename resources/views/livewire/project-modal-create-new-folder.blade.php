    <div>
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">{{ __('projects.newFolder') }}</h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group position-relative has-icon-left">
                        <div class="position-relative">
                            {{-- nameNewFolder --}}
                            <input type="text" id="folder_name" class="form-control" placeholder="{{ __('projects.newFolder') }}" wire:model="nameNewFolder">
                            <div class="form-control-icon">
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">{{ __('projects.cancel') }}</button>
            <button wire:click="createNewFolder" type="button" class="btn btn-primary btn-sm">
                <div wire:loading wire:target="createNewFolder" class="text-center">
                    <div class="spinner-border position-relative" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                &nbsp;
                {{ __('projects.createFolder') }}
            </button>
        </div>
    </div>