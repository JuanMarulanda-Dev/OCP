@extends('Layout/main')

@section('css')
    <link  href="{{ asset("viewerjs/dist/viewer.css") }}" rel="stylesheet">
@endsection

@section('content')

    <section class="section">
        
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="d-inline-flex align-items-center p-2 bd-highlight" href="{{ route("proyectos.index") }}">
                            <i class="fas fa-arrow-circle-left"></i>
                            <h3 class="">&nbsp;{{ __('main.projects') }}</h3>
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
                            aria-controls="details" aria-selected="true">{{ __('projects.projectsDetails') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#files" role="tab"
                            aria-controls="files" aria-selected="false">{{ __('projects.files') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="home-tab">
                {{-- Details --}}

                @if (Auth::user()->user_rol_id == 1)
                    {{-- Administrador --}}
                    <div class="row">
                        <div class="d-flex justify-content-end mb-4">
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteProject">
                                <i class="fas fa-trash-alt"></i>
                                &nbsp;&nbsp;&nbsp;
                                {{ __('projects.delete') }}
                            </button>
                            &nbsp;
                            <a href="{{ route("proyectos.edit", $project->encid) }}" class="btn icon icon-left btn-primary float-right">
                                <i class="fas fa-pencil-alt"></i>
                                &nbsp;&nbsp;&nbsp;{{ __('projects.edit') }}
                            </a>
                        </div>
                    </div>
                @endif

                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        @livewire('project-card', ['project' => $project, 'link' => null], key($project->id))
                    </div>

                    <div class="col-lg-4 col-md-12">
                        @livewire('project-files-section', ['project_folder' => $project_folder])
                    </div>

                </div>

                @livewire('project-cover-page', ['project_folder' => $project_folder])

            </div>
            <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="home-tab">
                {{-- Files --}}
                <div class="container">
                    <div class="row">
                        <h4>{{ $project->name }}</h4>
                    </div>
                </div>
                @livewire('form-project-file', ['project' => $project, 
                                                'project_folder' => $project_folder],
                                                key($project->encid))

            </div>
        </div>

    </section>


    <div class="modal fade" id="createNewFolder" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @livewire('project-modal-create-new-folder')
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="confirmDeleteProject" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('projects.deleteProject') }}</h5>
                </div>
                <div class="modal-body">
                    {{ __('projects.deleteConfirmation') }} <strong>{{ $project->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">{{ __('projects.cancel') }}</button>
                    <button onclick="Livewire.emit('destroy')" type="button" class="btn btn-danger btn-sm">{{ __('projects.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset("viewerjs/dist/viewer.js") }}"></script>

    <script>
        // Viewverjs instance
        const viewer = new Viewer(document.getElementById('images'), {
            title: false
        });
    </script>

    <script>

        let path;

        $(document).ready(function () {

            @if(session()->has('body') && session()->has('title'))
                toastr.success("{{ session('body') }}", "{{ session('title') }}")
            @endif

            $(document).on('click', '.showDeleteConfirmation', function (e) {
                e.preventDefault();
                path = $(e.currentTarget).data('path');
                $('#confirDeleteItem').modal('show');
            });

            $('#seemore').on('click', function (e) {
                e.preventDefault()
                $('#myTab a[href="#files"]').tab('show')
            })

            $(document).bind("contextmenu", function(e){  
                return false;
            });

            function copyFileUrl(){
                $(element).find('a').attr('href').select();
            }

            $(document).on('click', '.copyFileUrl', function (e) {
                var $temp = $("<input>");
                $("body").append($temp);
                let url = $(e.currentTarget).parents('div.section-project-item').find('a').attr('href');
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();
            });

            $(document).on('mousedown', '.section-project-item', function (e) {
                $(".menucontext").css('opacity', '0');
                if (e.button == 2){
                    $(e.currentTarget).find(".menucontext").css("top", e.pageY - 325);
                    $(e.currentTarget).find(".menucontext").css("left", e.pageX - 280);
                    $(e.currentTarget).find(".menucontext").css('opacity', '1');
                }
            });

            $(document).mousedown(function(e){ 
                if(e.button == 0){
                    $(".menucontext").css('opacity', '0');
                }
            });

            Livewire.on('ShowChooseFile', () => {
                $("#file").click();
            });

            Livewire.on('ShowActionFinishedSuccess', (body, title) => {
                toastr.success(body, title)
            });

            Livewire.on('HiddeCreateNewFolderModal', () => {
                $('#createNewFolder').modal('hide')
            });

            Livewire.on('showConfirmActionDeletePath', () => {
                $("#confirDeleteItem").modal();
            });

        });

        function emitEventDestroy(){
            Livewire.emit('destroyPath', path);
        }

        function showFileInOtherWindow(element){
            let url = $(element).find('a').attr('href');
            window.open(url);
        }

    </script>
    
@endpush

