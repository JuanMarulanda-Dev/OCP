<div>
    <section class="section">
    
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("usuarios.index") }}">
                            <i data-feather="arrow-left"></i>
                            <h3 class="">&nbsp;Usuarios</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#user-form" role="tab"
                            aria-controls="home" aria-selected="true">Datos de usuario</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#projects" role="tab"
                            aria-controls="profile" aria-selected="false">Proyectos asignados</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user-form" role="tabpanel" aria-labelledby="home-tab">
                        <!-- // Basic multiple Column Form section start -->
                        <form class="form mt-4 p-3" enctype="multipart/form-data" wire:submit.prevent="submit_user_create">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 d-flex lign-items-center justify-content-center">
                                    <div class="img-user position-relative">
                                        <div class="rounded">
                                            <i data-feather="image" style="color: #fff;"></i>
                                        </div>
                                        <input type="file" class="d-none" name="user-photo" accept="image/*" wire:model="image">
                                        <button type="button" class="btn icon btn-primary float-right"><i data-feather="upload"></i></button>
                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="first-name">Nombre</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="text" id="first-name" class="form-control" placeholder="Nombre" wire:model="name">
                                                    <div class="form-control-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                                @error('name') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="last-name">Apellido</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="text" id="last-name" class="form-control" placeholder="Apellido" wire:model="last_name">
                                                    <div class="form-control-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                                @error('last_name') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="company">Compañia</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="text" id="company" class="form-control" placeholder="Compañia" wire:model="company">
                                                    <div class="form-control-icon">
                                                        <i data-feather="home"></i>
                                                    </div>
                                                </div>
                                                @error('company') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="profession">Profesión</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="text" id="profession" class="form-control" placeholder="Profesión" wire:model="profession">      
                                                    <div class="form-control-icon">
                                                        <i data-feather="briefcase"></i>
                                                    </div>
                                                </div>
                                                @error('profession') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="email">Email:</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="email" id="email" class="form-control" placeholder="Email" wire:model="email">
                                                    <div class="form-control-icon">
                                                        <i data-feather="mail"></i>
                                                    </div>
                                                </div>
                                                @error('email') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="tel">Telefono</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="text" id="tel" class="form-control" placeholder="Telefono" wire:model="phone">
                                                    <div class="form-control-icon">
                                                        <i data-feather="phone"></i>
                                                    </div>
                                                </div>
                                                @error('phone') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="rol-user">Rol de usuario:</label>
                                                </div>
                                                <div class="position-relative">
                                                    <select class="form-select" id="rol-user" wire:model="user_rol_id" style="padding-left: 2.5rem;">
                                                        <option selected>Choose...</option>
                                                        @foreach ($roles as $rol)
                                                            <option value="{{$rol->id}}">{{ $rol->rol }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i data-feather="users"></i>
                                                    </div>
                                                </div>
                                                @error('user_rol_id') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
    
                                            <div class="form-group position-relative has-icon-left">
                                                <div class="clearfix">
                                                    <label for="password">Nueva contraseña</label>
                                                </div>
                                                <div class="position-relative">
                                                    <input type="password" id="password" class="form-control" placeholder="Contraseña" wire:model="password">
                                                    <div class="form-control-icon">
                                                        <i data-feather="lock"></i>
                                                    </div>
                                                </div>
                                                @error('password') <span class="error"><small>{{ $message }}</small></span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Cancelar</button>
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Crear Usuario</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- // Basic multiple Column Form section end -->
                    </div>
                    <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="home-tab">

                    </div>
                </div>
            </div>
        </div>
    
    </section>
</div>
