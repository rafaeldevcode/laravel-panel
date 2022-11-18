<aside class='bg-cm-secondary sidebar'>
    <x-profile />

    <nav>
        <ul class='m-0 p-2'>
            @foreach ($menus as $menu)
                @can('read', $menu->prefix)
                    <li class='d-flex flex-row align-items-center rounded item-nav-sidbar' data-item-menu='{{ $uri == $menu->prefix ? 'active' : 'inactive' }}'>
                        <div class='nav-icon text-color-main text-center w-100'>
                            <a @if(!isset($menu->submenus)) href='{{ $menu->slug }}' @endif title={{ $menu->name }} class='text-decoration-none d-block fw-bold text-cm-light'>
                                <div class='d-flex align-items-center w-100'>
                                    <i class='{{ $menu->icon }} fs-5 iconManu'></i>
                                    <div class='ms-2 hiddeItem dNone' data-item-active='false'>
                                        {{ $menu->name }}
                                    </div>
                                </div>
                            </a>
                        </div>

                        @if ($menu->submenus)
                            <ul class="m-0 p-1 position-absolute bottom-0 end-0 submenu bg-cm-secondary rounded">
                                @foreach (json_decode($menu->submenus, true) as $indice => $value)
                                    <li class="submenu_li rounded">
                                        <a class="text-cm-light fw-bold text-decoration-none d-block rounded" href="{{ $indice }}" title="{{ $value }}">
                                            {{ $value }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
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
