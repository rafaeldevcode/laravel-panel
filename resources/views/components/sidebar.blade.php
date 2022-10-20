<aside class='bg-cm-secondary sidebar'>
    <x-profile />

    <nav>
        <ul class='m-0 p-2'>
            @foreach ($menus as $menu)
                @can('read', $menu->prefix)
                    <li class='d-flex flex-row align-items-center rounded item-nav-sidbar' data-item-menu='{{ $uri == $menu->prefix ? 'active' : 'inactive' }}'>
                        <div class='nav-icon text-color-main text-center w-100'>
                            <a href='{{ $menu->slug }}' title={{ $menu->name }} class='text-decoration-none d-block fw-bold text-cm-light'>
                                <div class='d-flex align-items-center w-100'>
                                    <i class='{{ $menu->icon }} fs-5 iconManu'></i>
                                    <div class='ms-2 hiddeItem dNone' data-item-active='false'>
                                        {{ $menu->name }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                @endcan
            @endforeach

            <li class='d-flex flex-row align-items-center rounded item-nav-sidbar-logout' data-item-menu='inactive'>
                <div class='nav-icon text-color-main text-center w-100'>
                    <form action="/logout" title={{ $menu->name }} class='d-block fw-bold' method="POST">
                        @csrf
                        <button type="submit" title="Fazer logout" class='d-flex align-items-center w-100 text-cm-light'>
                            <i class='bi bi-box-arrow-right fs-5 iconManu'></i>
                            <div class='ms-2 hiddeItem dNone' data-item-active='false'>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</aside>
<div id='divClosed'></div>
