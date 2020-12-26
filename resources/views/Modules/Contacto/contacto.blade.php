@extends('Layout/main')

@section('css')

@endsection

@section('content')

<section class="section">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3><i class="fas fa-phone-alt"></i>&nbsp;Contacto</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">

    
            <div class="row">
                @livewire('form-contac');
            </div>
    
        </div>
    </div>

</section>

@endsection

@push('scripts')


@endpush
