<div class="row">

    <div class="col-12 mb-2">
        <ul id="images" class="p-0" style="list-style: none; cursor: zoom-in;">
            @forelse ($images as $image)

                <li><img src="{{ config('aws3.aws_url_bucket') . $image }}" class="img-fluid" alt="{{ $image }}"></li>

            @empty

            <div class="col-12 text-center">
                {{ __('projects.noImages') }}
            </div>
    
            @endforelse
        </ul>
    </div>




</div>
