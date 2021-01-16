@extends('Layout/main')

@section('css')

@endsection

@section('content')

    @include('Modules.Projects.section', [
        'project' => null, 
        ])

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            Livewire.on('ShowProfileImage', () => {
                $("#image").click();
            });

        });
    </script>
@endpush
