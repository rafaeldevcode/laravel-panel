<div class='w-7/12 relative section-image-login'>
    <div class='absolute top-0 left-0 image-bg-login' style="background-image: url('{{ asset("assets/images/{$image}") }}')"></div>

    <div class='absolute bottom-0 left-0 m-2 flex flex-nowrap'>
        <div class='me-3'>
            <i class='bi bi-gear-fill text-7xl text-color-main'></i>
        </div>

        <div>
            <h1 class='m-0 text-4xl text-color-main font-bold'>{{ $name }}</h1>
            <p class='m-0 text-xl text-color-main font-bold'>{{ $description }}</p>
        </div>
    </div>
</div>
