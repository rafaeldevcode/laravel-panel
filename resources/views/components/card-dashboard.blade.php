@foreach ($menus as $menu)
    <a href='{{ $menu->slug }}' class='bg-color-main border border-color-main p-2 rounded text-decoration-none card-dashboard m-2 text-center text-cm-light'>
        <div>
            <p class='m-0 p-0 text-start'><i class='{{ $menu->icon }}'></i></p>

            <div class='px-3'>
                <h2 class='mb-0 fs-3'>{{ $menu->name }}</h2>
                <p class='fs-4 fw-bold mt-2 mb-0'>10</p>
            </div>
        </div>
    </a>
@endforeach
