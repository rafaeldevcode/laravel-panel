<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/menus/edit/{{ $menu->id }}">
        @csrf

        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome do item do menu' icon='bi bi-menu-button-wide-fill' :value='$menu->name' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='icon' label='Ícone' icon='bi bi-emoji-smile' :value='$menu->icon' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='slug' label='Slug (Sem espaçoe e ascentos)' icon='bi bi-link' :value='$menu->slug' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-number name='position' label='Posição' icon='bi bi-123' :value='$menu->position' required />
            </div>

            <div class='col-12 col-md-6' hidden>
                <x-input-text name='submenus' label='Submenu' icon='bi bi-link' :value='$menu->submenus' />
            </div>
        </div>

        @if (!empty(json_decode($menu->submenus, true)))
            <div class='row d-flex' id="list-submenus">
                <p>Submenus</p>
                @foreach (json_decode($menu->submenus, true) as $indice => $value)
                    <div class='col-12 col-sm-6 my-1 my-sm-0 col-md-4 col-lg-3 d-flex justify-content-between flex-nowrap'>
                        <div class="rounded-start w-100 p-1 border border-color-main text-color-main">
                            {{ $value }}
                        </div>
                        <button data-submenu="delete" data-key="{{ $indice }}" data-value="{{ $value }}" type="button" title="Remover submenu" class="btn btn-sm btn-color-main rounded-0 rounded-end">
                            <i class="bi bi-x-lg text-cm-light"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif

        <div class='row d-flex justify-content-end mt-3'>
            <span>Os ícones ultilizados são do <a href="https://icons.getbootstrap.com" target='_blank' rel='noopener'>bootstrap icons</a>, copie a classe e cole no input do ícone do menu.</span>

            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar menu' value='Salvar menu' style='color-main' />
            </div>
        </div>
    </form>
</section>
