@extends('Layout/main')

@section('content')

<section class="section">
    
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("usuers") }}">
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
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Datos de usuario</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Proyectos asignados</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- // Basic multiple Column Form section start -->
                    <form id="form-user" class="form mt-4 p-3">
                        
                        <div class="row">
                            <div class="col-md-3 d-flex lign-items-center justify-content-center">
                                <div class="img-user position-relative">
                                    <div class="rounded">
                                        <i data-feather="image" style="color: #fff;"></i>
                                    </div>
                                    <input type="file" class="d-none" name="user-photo" id="" accept="image/*">
                                    <button class="btn icon btn-primary float-right"><i data-feather="upload"></i></button>
                                </div>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="first-name-column">Nombre</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" id="first-name-column" class="form-control" placeholder="Nombre"
                                                name="fname-column">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="last-name-column">Apellido</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Apellido"
                                                name="lname-column">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="company-column">Compañia</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" id="company-column" class="form-control" placeholder="Compañia" name="company-column">
                                                <div class="form-control-icon">
                                                    <i data-feather="home"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="profession-floating">Profesión</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" id="profession-floating" class="form-control" name="profession-floating"
                                                placeholder="Profesión">
                                                <div class="form-control-icon">
                                                    <i data-feather="briefcase"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="email-id-column">Email:</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="email" id="email-id-column" class="form-control" name="email-id-column"
                                                placeholder="Email">
                                                <div class="form-control-icon">
                                                    <i data-feather="mail"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="tel-column">Telefono</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" id="tel-column" class="form-control" name="tel-column"
                                                placeholder="Telefono">
                                                <div class="form-control-icon">
                                                    <i data-feather="phone"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="rol-user-column">Rol de usuario:</label>
                                            </div>
                                            <div class="position-relative">
                                                <select class="form-select" id="inputGroupSelect01" style="padding-left: 2.5rem;">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">

                                        <div class="form-group position-relative has-icon-left">
                                            <div class="clearfix">
                                                <label for="password-column">Nueva contraseña</label>
                                            </div>
                                            <div class="position-relative">
                                                <input type="password" id="password-column" class="form-control" name="password-column"
                                                placeholder="Contraseña">
                                                <div class="form-control-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                            </div>
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')

@endpush
