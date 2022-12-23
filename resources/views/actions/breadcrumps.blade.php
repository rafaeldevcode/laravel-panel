<section class='p-3'>
    <div class='border-bottom mb-3 d-flex justify-content-between flex-column flex-md-row align-items-start align-items-md-end'>
        <div>
            <div class="breadcrumps-overflow">
                <ul class='p-0 d-flex flex-nowrap text-cm-secondary'>
                    <li class='me-2'><span class='badge bg-{{ $color }} rounded-fill'>{{ $type }}</span></li>
                    @foreach ($breadcrumps as $breadcrump)
                        <li>&gt;</li>
                        <li class='mx-3'>
                            <a class='text-cm-secondary text-decoration-none' href='/{{ $breadcrump['slug'] }}'>{{ $breadcrump['name'] }}</a>
                        </li>
                    @endforeach

                    @isset($ID)
                        <li>&gt;</li>
                        <li class='mx-3'>
                            <a class='text-cm-secondary text-decoration-none' href='/{{ $breadcrumps[count($breadcrumps)-1]['slug'].'/'.$ID }}'>{{ $ID }}</a>
                        </li>
                    @endisset
                </ul>
            </div>

            <div class='d-flex frex-nowrap align-items-center mb-2'>
                <span class='bg-color-main rounded d-block d-flex justify-content-center align-items-center px-2 me-1'>
                    <i class='{{ $icon }} text-cm-light fs-2'></i>
                </span>
                <p class='fs-2 fw-bold text-cm-secondary m-0'>{{ $title }}</p>
            </div>
        </div>

        @isset($options)
            <div class='d-flex flex-column flex-sm-row mb-3 mx-auto mx-md-0'>
                @isset($options['search'])
                    <x-input-search />
                @endisset

                <div class='d-flex justify-content-center'>
                    @isset($options['delete'])
                        <button data-button="delete-several" id='deleteAll' type='button' title='Remover vários(a) {{ $title }}' class='btn btn-md btn-cm-danger ms-1 disabled text-cm-light' data-route='{{ $route }}'>
                            Remover
                        </button>
                    @endisset

                    @isset($options['add'])
                        <a href='{{ $options['add']['href'] }}' title='Adicionar {{ $title }}' class='btn btn-md btn-cm-primary mx-1 text-cm-light'>Adicionar</a>
                    @endisset

                    <button type='button' id='back' title='Voltar a página anterior' class='btn btn-md btn-cm-info text-cm-light'>
                        Voltar
                    </button>
                </div>
            </div>
        @else
            <div class='mb-3 mx-md-0 w-100'>
                <div class="w-100 d-flex justify-content-end">
                    <button type='button' id='back' title='Voltar a página anterior' class='btn btn-md btn-cm-info text-cm-light'>
                        Voltar
                    </button>
                </div>
            </div>
        @endisset
    </div>
</section>
