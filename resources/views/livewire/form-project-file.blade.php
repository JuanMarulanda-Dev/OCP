<div class="card files">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <input id="file" type="file" class="d-none" accept="*" wire:model="file">
                <div class="d-flex justify-content-between align-items-center rounded" style="background: #f7f7f7;">
                    <div>
                        <button wire:click="rollbackProjectFolder" class="rounded-circle border-0" @if($route_content == "/") disabled @endif>
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <span style="font-size: 1.5rem;">{{ $route_content }}</span>
                    </div>
                    @if (Auth::user()->user_rol_id == 1)
                        {{-- Administrador --}}
                        <div>
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#createNewFolder">
                                <i class="fas fa-folder-plus"></i>
                                &nbsp;&nbsp;&nbsp;
                                {{ __('projects.newFolder') }}
                            </button>
                            <button class="btn btn-outline-primary" wire:click="$emit('ShowChooseFile')">
                                <i class="fas fa-cloud-upload-alt"></i>
                                &nbsp;&nbsp;&nbsp;
                                {{ __('projects.uploadFile') }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="files-sections">
                    <div class="container">

                        <div class="row">
                            <div wire.emit.target="changePorjectFolder" wire:target="destroyPath,rollbackProjectFolder,createNewProjcetFolder" wire:loading class="text-center">
                                <br>
                                <div class="spinner-border position-relative" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <div class="row" wire.emit.target="changePorjectFolder" wire:target="destroyPath,rollbackProjectFolder,createNewProjcetFolder" wire:loading.class="d-none">
                            @forelse ($project_content as $item)
                                <div class="col-lg-2">
                                    @php
                                        $name = explode('/', $item);
                                        $nameItem = $name[count($name) - 1];
                                        $is = $this->isFolderOrFile($nameItem)
                                    @endphp

                                    @include('Modules.Projects.item', [
                                        'name' => $nameItem,
                                        'isFolderOrFile' => $is,
                                        'path' => $item,
                                    ])

                                </div>
                            @empty

                                <span class="text-center">{{ __('projects.noContent') }}</span>

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
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('projects.deleteItem') }}</h5>
                </div>
                <div class="modal-body">
                    {{ __('projects.deleteItemConfirmation') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">{{ __('projects.cancel') }}</button>
                    <button onclick="emitEventDestroy()" data-dismiss="modal" type="button" class="btn btn-danger btn-sm">{{ __('projects.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

</a>