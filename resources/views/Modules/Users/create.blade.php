@extends('Layout/main')

@section('css')
    
@endsection

@section('content')

    @livewire('form-user')

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset("js/tostr_config.js") }}"></script>
@endpush

@push('listeners')
        Livewire.on('ShowActionFinishedSuccess', (body, title) => {
            toastr.success(body, title)
        });

        Livewire.on('ShowProfileImage', () => {
            $("#image").click();
        });

@endpush
