<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/menus/add">
        @csrf
        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='name' label='Nome do item do menu' icon='bi bi-menu-button-wide-fill' type="text" required />
            </div>

            <div class='w-full md:w-6/12 px-4' data-submenu="false">
                <x-input-default name='icon' label='Ícone' icon='bi bi-emoji-smile' type="text" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='slug' label='Slug (Sem espaçoe e ascentos)' icon='bi bi-link' type="text" required />
            </div>

            <div class='w-full md:w-6/12 px-4' data-submenu="false">
                <x-input-default name='position' label='Posição' icon='bi bi-123' type="number" required />
            </div>

            {{-- <div class='w-full md:w-6/12 px-4' data-submenu="true">
                <div class='d-flex flex-column position-relative my-4'>
                    <i class='bi bi-file-earmark-lock-fill position-absolute m-2'></i>
                    <select class='form-select ps-4 focus-shadown-none' name='submenu' id='submenu'>
                        <option>Selecione o menu principal</option>

                        @foreach ($menus as $menu)
                            <option value='{{ $menu->id }}'>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    <label class='position-absolute ms-4 my-2 px-2 input-transform-translate' for='submenu'>Selecione o menu principal</label>
                    <span class='position-absolute end-0 bottom-0 validit'></span>
                </div>
            </div>

            <div class='col-12'>
                <x-input-checkbox-switch name="is_submenu" label='Esté um submneu?' />
            </div> --}}
        </div>

        <div class='flex justify-end px-4'>
            <x-input-button type='submit' title='Salvar menu' value='Salvar menu' style='color-main' />
        </div>
    </form>
</section>
