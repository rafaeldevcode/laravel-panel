<div class='col-7 position-relative section-image-login'>
    <div class='position-absolute top-0 start-0 image-bg-login' style="
        background-image: url('{{ $image }}')
    "></div>

    <div class='position-absolute bottom-0 start-0 m-2 d-flex flex-nowrap text-cm-dark'>
        <div class='me-3'>
            <i class='bi bi-gear-fill display-3'></i>
        </div>

        <div>
            <h1 class='m-0 fs-2'>{{ $name }}</h1>
            <p class='m-0 fs-4'>{{ $description }}</p>
        </div>
    </div>
</div>
