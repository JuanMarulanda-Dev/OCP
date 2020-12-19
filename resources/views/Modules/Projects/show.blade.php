@extends('Layout/main')

@section('css')

@endsection

@section('content')

    <section class="section">
        
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("proyectos.index") }}">
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#details" role="tab"
                            aria-controls="details" aria-selected="true">Detalles del proyecto</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#files" role="tab"
                            aria-controls="files" aria-selected="false">Archivos</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="home-tab">
                {{-- Details --}}

                <div class="row">
                    <div class="d-flex justify-content-end mb-4">
                        <button class="btn btn-outline-danger" wire:click="destroyConfirm()">
                            <i class="fas fa-trash-alt"></i>
                            &nbsp;&nbsp;&nbsp;
                            Eliminar
                        </button>
                        &nbsp;
                        <a href="{{ route("proyectos.create") }}" class="btn icon icon-left btn-primary float-right">
                            <i class="fas fa-pencil-alt"></i>
                            &nbsp;&nbsp;&nbsp;Editar
                        </a>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-8">
                        @include('Modules.Projects.project-card', [
                            'project' => $project
                        ])
                    </div>

                    <div class="col-md-4">
                        @include('Modules.Projects.file-section')
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        Imagenes
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="home-tab">
                {{-- Files --}}
                <div class="container">
                    <div class="row">
                        <h4>{{ $project->name }}</h4>
                    </div>
                </div>
                @livewire('form-project-file', ['project' => $project] , key($project->id))

            </div>
        </div>

    </section>

@endsection

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function () {
            
            Livewire.on('ShowActionFinishedSuccess', (body, title) => {
                toastr.success(body, title)
            });

            Livewire.on('ShowProfileImage', () => {
                $("#image").click();
            });

            $('#seemore').on('click', function (e) {
                e.preventDefault()
                $('#myTab a[href="#files"]').tab('show')
            })

            $(document).bind("contextmenu", function(e){  
                return false;
            });

            $(document).mousedown(function(e){ 
                if(e.button == 0){
                    $(".menucontext").hide('fast')
                }
            });

            $(".section-project-item").mousedown(function(e) {
                $(".menucontext").hide('fast')
                if (e.button == 2){
                    console.log($(e.currentTarget).find(".menucontext"));
                    $(e.currentTarget).find(".menucontext").css("top", e.pageY - 325);
                    $(e.currentTarget).find(".menucontext").css("left", e.pageX - 280);
                    $(e.currentTarget).find(".menucontext").show('fast');

                }

            });
        });

    </script>
    
@endpush

@push('listeners')
        

@endpush
