<a class="card text-decoration-none"@isset($link) href="{{ route('proyectos.show', $project->encid) }}" @endisset>
    <div class="card-body">
        <div class="content-project">
            <div class="row">
                <div class="col-md-2">
                    @isset($project->image)
                        <div class="project-image">
                            <img class="rounded" src="{{config("aws3.aws_url_bucket").$project->image->image}}" alt="project_image">
                        </div>
                    @else
                        <div class="d-flex justify-content-center align-items-center rounded bg-secondary text-white project-icon">
                            <i class="fas fa-user"></i>
                        </div>
                    @endisset
                </div>
                <div class="col-11 col-md-10">
                    <div class="text-wrap">
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
                        {{ $project->progress }}% {{ __('projects.completed') }}
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
                            <small>{{ __('projects.created') }}</small>
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
                            <small>{{ __('projects.limitDate') }}</small>
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