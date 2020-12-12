@extends('Layout/main')

@section('css')
    
@endsection

@section('content')

    @include('Modules.Users.section', ['user' => $user])

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endpush

@push('listeners')
        Livewire.on('ShowActionFinishedSuccess', (body, title) => {
            toastr.success(body, title)
        });

        Livewire.on('ShowProfileImage', () => {
            $("#image").click();
        });

@endpush
