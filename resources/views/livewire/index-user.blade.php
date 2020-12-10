    <table class='table hover' id="table1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Compañia</th>
                <th>Rol</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr id="{{ $user->id }}">
                    <td>
                        <div class="avatar mr-3">
                            <img src="{{asset("images/avatar/avatar-s-1.png")}}" alt="" srcset="">
                        </div>
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->company }}</td>
                    <td>{{ $user->user_rol->rol }}</td>
                    <td>
                        <div class="actions d-flex justify-content-between">
                            <button>
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button wire:click="destroyConfirm({{ $user->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

