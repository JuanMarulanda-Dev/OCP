<section class="section">
    
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("usuarios.index") }}">
                        <i class="fas fa-arrow-circle-left"></i>
                        <h3 class="">&nbsp;Proyectos</h3>
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
                        aria-controls="home" aria-selected="true">Detalles del proyecto</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#projects" role="tab"
                        aria-controls="profile" aria-selected="false">Archivos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="user-form" role="tabpanel" aria-labelledby="home-tab">
                    <!-- // Basic multiple Column Form section start -->
                    @livewire('form-project', ['project' => null, 'profile' => null])
                    <!-- // Basic multiple Column Form section end -->
                </div>
                <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="home-tab">

                </div>
            </div>
        </div>
    </div>
</section>
