<div>
    <div class="container mt-4">
        {{-- Esto se deberia comvertir en un componenete --}}
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <label>{{ __('projects.projectFilter')}}</label>
            </div>
            <div class="col-sm-12 col-md-10">
                <div class="form-group position-relative has-icon-right">
                    <div id="project-filter" class="position-relative">
                        <input type="text" class="form-control" placeholder="Nombre" wire:model="filter_field">
                        <div class="form-control-icon">
                            <i class="fas fa-search" style="line-height: unset;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="projects-table">
            <thead>
                <tr>
                    <th scope="col">{{ __('projects.projectName')}}</th>
                    <th scope="col">{{ __('projects.startDate')}}</th>
                    <th scope="col">{{ __('projects.endDate')}}</th>
                    <th scope="col">{{ __('users.assigned')}}</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->name }}</th>
                        <td>{{ $project->first_date }}</td>
                        <td>{{ $project->last_date }}</td>
                        <td class="d-flex justify-content-center">
                            <div class='form-check'>
                                <div class="checkbox">
                                    <input wire:click="chooseProject('{{ $project->id }}')" type="checkbox" class='form-check-input' @if(Arr::exists($assignments, $project->id)) checked @endif>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="text-center">
                                {{ __('projects.noProjects')}}
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="float-right">
            {{ $projects->links() }}
        </div>
    </div>

    <div class="col-12 d-flex justify-content-end">
        <button wire:click="saveProjectAssignments" type="button" class="btn btn-primary mr-1 mb-1">
            <div wire:loading wire:target="saveProjectAssignments" class="text-center">
                <div class="spinner-border position-relative" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            &nbsp;
            {{ __('users.saveChanges')}}
        </button>
    </div>

</div>
