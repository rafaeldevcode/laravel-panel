<aside class='bg-secondary sidebar'>
    <x-profile />

    <nav>
        <ul class='m-0 p-2'>
            @foreach ($menus as $menu)
                @can('read', $menu->prefix)
                    <li class='flex flex-row items-center rounded item-nav-sidbar relative' data-item-menu='{{ $uri == $menu->prefix ? 'active' : 'inactive' }}'>
                        @if(isset($menu->count) && $menu->count !== 0)
                            <span class="menu-count badge bg-danger absolute top-0 start-0 rounded-full">{{ $menu->count }}</span>
                        @endif

                        <div class='nav-icon text-color-main text-center w-full'>
                            <a @if(!isset($menu->submenus)) href='{{ $menu->slug }}' @endif title={{ $menu->name }}  class='block font-bold text-light'>
                                <div class='flex items-center w-full'>
                                    <i class='{{ $menu->icon }} text-lg iconManu'></i>
                                    <div class='ml-2 hiddeItem dNone' data-item-active='false'>
                                        {{ $menu->name }}
                                    </div>
                                </div>
                            </a>
                        </div>

                        @if ($menu->submenus)
                            <ul class="m-0 p-1 absolute bottom-0 right-0 submenu bg-secondary rounded    ">
                                @foreach (json_decode($menu->submenus, true) as $indice => $value)
                                    <li class="submenu_li rounded">
                                        <a class="text-light font-bold block rounded" href="{{ $indice }}" title="{{ $value }}">
                                            {{ $value }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endcan
            @endforeach

            <li class='flex flex-row items-center rounded item-nav-sidbar-logout' data-item-menu='inactive'>
                <div class='nav-icon text-color-main text-center w-full'>
                    <form action="/admin/logout" class='d-block font-bold' method="POST">
                        @csrf
                        <button type="submit" title="Fazer logout" class='flex items-center w-full text-light'>
                            <i class='bi bi-box-arrow-right text-lg iconManu'></i>
                            <div class='ml-2 hiddeItem dNone' data-item-active='false'>
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
