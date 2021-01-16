<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <label>{{ __('users.userFilter')}}</label>
                </div>
                <div class="col-sm-12 col-md-10">
                    <div class="form-group position-relative has-icon-right">
                        <div id="project-filter" class="position-relative">
                            <input type="text" class="form-control" placeholder="{{ __('users.userName')}}..." wire:model="filter_field">
                            <div class="form-control-icon">
                                <i class="fas fa-search" style="line-height: unset;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class='table table-hover' id="tbl-users">
                    <thead>
                        <tr>
                            <th>{{ __('users.name')}}</th>
                            <th>{{ __('users.email')}}</th>
                            <th>{{ __('users.company')}}</th>
                            <th>{{ __('users.rol')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr id="{{ $user->encid }}">
                                <td>
                                    <div class="avatar mr-3">
                                        @isset($user->image)
                                            <img src="{{config("aws3.aws_url_bucket").$user->image->image}}" alt="">
                                        @else
                                            <span class="default-profile-image"><i class="fas fa-user-circle"></i></span>
                                        @endisset
                                        
                                    </div>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->company }}</td>
                                <td>{{ $user->user_rol->rol }}</td>
                                <td>
                                    <div class="actions d-flex justify-content-between">
                                        <button wire:click="showUserDetalis('{{ $user->encid }}')">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button wire:click="destroyConfirm('{{ $user->encid }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</div>