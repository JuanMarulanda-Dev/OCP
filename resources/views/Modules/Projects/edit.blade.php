@extends('Layout/main')

@section('css')

@endsection

@section('content')

    @include('Modules.Projects.section', [
        'project' => $project,
        'templates' => $templates,
        'content_types' => $content_types,
        ])

@endsection

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function () {

            // let form = $('#form-designs');

            Livewire.on('ShowProfileImage', () => {
                $("#image").click();
            });

            // form.submit(function (e) { 
            //     e.preventDefault();
                
            //     console.log(form.serialize());

            //     // Livewire.emit("");

            // });

        });
    </script>
@endpush

@push('listeners')
        

@endpush
