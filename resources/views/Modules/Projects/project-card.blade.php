<div class="col-lg-6 col-md-12">
    <a class="card text-decoration-none" href="{{ route('proyectos.show', $project->id) }}">
        <div class="card-body">
            <div class="content-project">
                <div class="row">
                    <div class="col-md-2">
                        <div class="d-flex justify-content-center align-items-center rounded bg-secondary text-white project-icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div>
                            {{ $project->name }}
                        </div>
                        <div class="small">
                            {{ $project->project_status->status }}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="progress progress-primary progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: {{ $project->progress }}%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>
                            {{ $project->progress }}% completado
                        </small>
                    </div>
                </div>
                <div class="row">
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
                <div class="row">

                    <div class="col-6">
                        <div>
                            <div>
                                <small>Creado</small>
                            </div>
                            <div>
                                <small>
                                    <i class="far fa-calendar-alt"></i>&nbsp;
                                    {{ $project->first_date }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div>
                            <div>
                                <small>Fecha limite</small>
                            </div>
                            <div>
                                <small>
                                    <i class="far fa-calendar-alt"></i>&nbsp;
                                    {{ $project->last_date }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <hr>
                </div>
            </div>
        </div>
    </a>
</div>