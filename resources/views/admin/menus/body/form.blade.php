<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="{{ isset($menu) ? route('menus.update', ['ID', $menu->id]) : route('menus.store') }}">
        @csrf
        @isset($menu)
            <input type="hidden" name="id" value="{{ $menu->id }}">
        @endisset

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='name' label='Nome do item do menu' icon='bi bi-menu-button-wide-fill' type="text" :value="isset($menu) ? $menu->name : null" required />
            </div>

            <div class='w-full md:w-6/12 px-4' data-submenu="false">
                <x-input-default name='icon' label='Ícone' icon='bi bi-emoji-smile' type="text" :value="isset($menu) ? $menu->icon : null" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='slug' label='Slug (Sem espaçoe e ascentos)' icon='bi bi-link' type="text" :value="isset($menu) ? $menu->slug : null" required />
            </div>

            <div class='w-full md:w-6/12 px-4' data-submenu="false">
                <x-input-default name='position' label='Posição' icon='bi bi-123' type="number" :value="isset($menu) ? $menu->position : null" required />
            </div>

            <div class='w-full md:w-6/12 px-4' data-submenu="true">
                <x-input-select name='submenu' label='Selecione o menu principal' icon='bi bi-file-earmark-lock-fill' :options="[1 => 'Permissão']" optionid="" optionvalue=""  />
            </div>
        </div>

        @if(!isset($menu))
            <div class='col-12 px-4'>
                <x-input-checkbox-switch name="is_submenu" label='Esté um submneu?' />
            </div>
        @else
            @isset($menu->submenus)
                <div class='flex flex-col px-4' id="list-submenus">
                    <p class="text-secondary">Submenus</p>

                    @foreach (json_decode($menu->submenus, true) as $indice => $value)
                        <div class='w-full lg:w-3/12 md:w-4/12 sm:w-6/12 my-1 my-sm-0 flex justify-between flex-nowrap'>
                            <div class="rounded-l w-full p-1 border-t border-b border-l border-color-main text-color-main">
                                {{ $value }}
                            </div>

                            <button data-submenu="delete" data-key="{{ $indice }}" data-value="{{ $value }}" type="button" title="Remover submenu" class="btn-color-main px-2 rounded-r">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endisset
        @endif

        <div class='flex justify-end px-4'>
            <x-input-button type='submit' title='Salvar menu' value='Salvar menu' style='color-main' />
        </div>
    </form>
</section>
