<header class='bg-color-main flex items-center w-full shadow-xl header'>
    <div class='my-2 flex justify-between items-center w-full h-[45px]'>
        <x-menu />

        <div class='flex items-center flex-nowrap'>
            <div class='logo-header w-auto my-auto'>
                <x-logo-header />
            </div>
        </div>
    </div>

    @can('read', 'settings')
        @isset($setting)
            <div class="ml-2 h-[61px]">
                <a href="{{ $setting }}" class="block p-2 flex items-center justify-center text-white h-full text-xs bg-secondary hover:text-color-main hover:bg-white ease-linear duration-300">
                    <i class="bi bi-gear-fill"></i>
                </a>
            </div>
        @endisset
    @endcan
</header>
