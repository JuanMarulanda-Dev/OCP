<form class="form mt-4 p-3" enctype="multipart/form-data" wire:submit.prevent="{{$action}}">
    @csrf
    <div class="row">
        <div class="col-md-3 d-flex lign-items-center justify-content-center">
            <div class="img-user position-relative">
                @error('image') <span class="error"><small>{{ $message }}</small></span> @enderror
                <div class="rounded">
                    @if ($image)
                        <img class="rounded" src="{{ ( (substr($image, 0, Str::length($folder_img)) === $folder_img) ? config("aws3.aws_url_bucket").$image : $image->temporaryUrl() ) }}" alt="project-image">
                    @else
                        <i class="fas fa-photo-video" style="color: #fff;"></i>
                    @endif
                </div>
                <input id="image" type="file" class="d-none" name="user-photo" accept="image/*" wire:model="image">
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
        
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="first-name">{{ __('users.name')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="first-name" class="form-control" placeholder="{{ __('users.name')}}" wire:model="name">
                            <div class="form-control-icon">
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                        @error('name') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="last-name">{{ __('users.lastName')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="last-name" class="form-control" placeholder="{{ __('users.lastName')}}" wire:model="last_name">
                            <div class="form-control-icon">
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                        @error('last_name') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="company">{{ __('users.company')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="company" class="form-control" placeholder="{{ __('users.company')}}" wire:model="company">
                            <div class="form-control-icon">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                        @error('company') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="profession">{{ __('users.profession')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="profession" class="form-control" placeholder="{{ __('users.profession')}}" wire:model="profession">      
                            <div class="form-control-icon">
                                <i class="fas fa-suitcase"></i>
                            </div>
                        </div>
                        @error('profession') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="email">{{ __('users.email')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="email" id="email" class="form-control" placeholder="{{ __('users.email')}}" wire:model="email">
                            <div class="form-control-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                        </div>
                        @error('email') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">

                    <div class="form-group position-relative has-icon-left">
                        <div class="clearfix">
                            <label for="tel">{{ __('users.phone')}}</label>
                        </div>
                        <div class="position-relative">
                            <input type="text" id="tel" class="form-control" placeholder="{{ __('users.phone')}}" wire:model="phone">
                            <div class="form-control-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </div>
                        @error('phone') <span class="error"><small>{{ $message }}</small></span> @enderror
                    </div>
                </div>

                @if(!$profile)

                    <div class="col-md-6 col-12">
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="rol-user">{{ __('users.rol')}}</label>
                            </div>
                            <div class="position-relative">
                                <select class="form-select" id="rol-user" wire:model="user_rol_id" style="padding-left: 2.5rem;">
                                    <option selected>{{ __('users.choose')}}...</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}">{{ $rol->rol }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-icon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                            @error('user_rol_id') <span class="error"><small>{{ $message }}</small></span> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">{{ __('users.password')}}</label>
                            </div>
                            <div class="position-relative">
                                <input type="password" id="password" class="form-control" placeholder="{{ __('users.password')}}" wire:model="password">
                                <div class="form-control-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            @error('password') <span class="error"><small>{{ $message }}</small></span> @enderror
                        </div>
                    </div>

                @endif

                <div class="col-12 d-flex justify-content-end">
                    @empty($user)
                        <button wire:click="cleanAllFields" type="reset" class="btn btn-light-secondary mr-1 mb-1">{{ __('users.cancel')}}</button>
                    @endempty
                    <button type="submit" class="btn btn-primary mr-1 mb-1">
                        <div wire:loading wire:target="{{$action}}" class="text-center">
                            <div class="spinner-border position-relative" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        &nbsp;
                        @if($user){{ __('users.update')}} @else {{ __('users.create')}} @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>