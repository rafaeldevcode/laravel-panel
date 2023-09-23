<section class='p-3'>
    <div class='border-b flex justify-between flex-col md:flex-row items-start md:items-end'>
        <div>
            <div class="breadcrumps-overflow">
                <ul class='p-0 flex flex-nowrap text-secondary'>
                    <li class='mr-2'><span class='bg-{{ $color }} rounded text-white font-bold text-xs py-1 px-2'>{{ $type }}</span></li>

                    @foreach ($breadcrumps as $breadcrump)
                        <li class='mx-2'>
                            <a title="Breadcrumps item" class='text-secondary bg-gray-200 rounded-full text-xs py-1 px-3 block font-bold' href='/{{ $breadcrump['slug'] }}'>
                                {{ $breadcrump['name'] }}
                            </a>
                        </li>
                    @endforeach

                    @isset($ID)
                        <li class='mx-2'>
                            <a title="Breadcrumps item" class='text-secondary bg-gray-200 rounded-full text-xs py-1 px-3 block font-bold' href='/{{ $breadcrumps[count($breadcrumps)-1]['slug'].'/'.$ID }}'>{{ $ID }}</a>
                        </li>
                    @endisset
                </ul>
            </div>

            <div class='flex frex-nowrap my-2 items-'>
                <button type='button' id='back' title='Voltar a página anterior' class='rounded py-2 px-1 btn-color-main mr-1 text-light'>
                    <i class="bi bi-arrow-bar-left text-2xl"></i>
                </button>

                <span class='bg-color-main rounded p-2 mr-1'>
                    <i class='{{ $icon }} text-light text-2xl'></i>
                </span>

                <p class='text-3xl font-bold text-secondary block my-auto'>{{ $title }}</p>
            </div>
        </div>

        <div class='flex flex-col sm:flex-row mb-2 mx-auto md:mx-0'>
            <div class='flex justify-center'>
                <div class="mx-1">
                    @isset($search)
                        <x-input-search />
                    @endisset
                </div>

                @isset($delete)
                    <button data-button="delete-several" id='deleteAll' type='button' title='Remover vários(a) {{ $title }}' class='btn text-xs font-bold btn-danger mx-1 text-light' data-route='{{ $route_delete }}' disabled>
                        Remover
                    </button>
                @endisset

                @isset($route_add)
                    <a href='{{ $route_add }}' title='Adicionar {{ $title }}' class='text-xs btn btn-primary font-bold mx-1'>Adicionar</a>
                @endisset
            </div>
        </div>
    </div>

    @isset($sub_options)
        <div class="bg-secondary">
            @include($sub_options)
        </div>
        @endisset
</section>

