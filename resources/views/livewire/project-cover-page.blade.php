<div class="row">
    @forelse ($images as $image)

        <div class="col-12 mb-2">
            <img src="{{ config("aws3.aws_url_bucket").$image }}" class="img-fluid" alt="{{ $image }}">       
        </div>

    @empty

    <div class="col-12 text-center">
        No hay imagenes
    </div>

    @endforelse

</div>
