<form class="form mt-4 p-3" enctype="multipart/form-data" wire:submit.prevent="{{$action}}">
    @csrf
    <div class="row">
        <div class="col-md-4 d-flex lign-items-center justify-content-center">

            <div class="img-project position-relative">
                @error('image') <span class="error"><small>{{ $message }}</small></span> @enderror
                <div class="rounded">
                    @if ($image)
                        <img class="rounded" src="{{ (substr($image, 0, Str::length(config('aws3.aws_prefix_project_folder'))) === config('aws3.aws_prefix_project_folder')) ? config("aws3.aws_url_bucket").$image : $image->temporaryUrl() }}" alt="profile">
                    @else
                        <i class="fas fa-photo-video" style="color: #fff;"></i>
                    @endif
                </div>
                <input id="image" type="file" class="d-none" name="project-photo" accept="image/*" wire:model="image">
                <div wire:loading wire:target="image" class="text-center">
                    <div class="spinner-border text-primary position-relative" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <button wire:click="$emit('ShowProfileImage')" type="button" 
                class="btn-primary float-right position-relative text-center">
                    <i class="fas fa-cloud-upload-alt"></i>
                </button>
            </div>
            
        </div>
        
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="first-name">Nombre</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="first-name" class="form-control" placeholder="Nombre" wire:model="name">
                            <div class="form-control-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                        </div>
                        @error('name') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative">
                        <div class="clearfix">
                            <label for="last-name">Fecha de inicio</label>
                        </div>
                        <input type="date" id="last-name" class="form-control" placeholder="Apellido" wire:model="first_date">
                        @error('first_date') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>

                </div>
                
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative">
                        <div class="clearfix">
                            <label for="last-name">Fecha de inicio</label>
                        </div>
                        <input type="date" id="last-name" class="form-control" placeholder="Apellido" wire:model="last_date">
                        @error('last_date') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 col-12">
                    <div class="form-group position-relative">
                        <div class="clearfix">
                            <label for="type_id">Tipo de proyecto</label>
                        </div>
                        <select class="form-select" id="type_id" wire:model="project_type_id">
                            <option selected>Seleccionar...</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @error('project_type_id') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="form-group position-relative">
                        <div class="clearfix">
                            <label for="status_id">Estado</label>
                        </div>
                        <select class="form-select" id="status_id" wire:model="project_status_id">
                            <option selected>Seleccionar...</option>
                            @foreach ($statuses as $status)
                                <option value="{{$status->id}}">{{ $status->status }}</option>
                            @endforeach
                        </select>
                        @error('project_status_id') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="profession">Progreso</label>
                        </div>
                        <div class="position-relative">
                            <input type="number" min="0" step="1" max="100" id="progress" class="form-control" placeholder="0" wire:model="progress">      
                            <div class="form-control-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                        @error('progress') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-3">
                        <textarea placeholder="Descripción del proyecto" class="form-control" rows="3" wire:model="description"></textarea>
                        @error('description') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button wire:click="cleanAllFields" type="reset" class="btn btn-light-secondary mr-1 mb-1">Cancelar</button>
                <button type="submit" class="btn btn-primary mr-1 mb-1">
                    <div wire:loading wire:target="{{$action}}" class="text-center">
                        <div class="spinner-border position-relative" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    &nbsp;
                    @if($project)Actualizar @else Crear @endif Proyecto
                </button>
            </div>

        </div>
    </div>
</form>