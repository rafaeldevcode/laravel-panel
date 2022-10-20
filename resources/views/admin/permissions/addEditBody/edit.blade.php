<section class='p-2 p-md-5 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/permissions/edit/{{ $permissions->id }}">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome da permição' icon='bi bi-file-earmark-lock-fill' required :value='$permissions->name' />
            </div>
        </div>

        <div class='d-flex flex-wrap justify-content-evenly'>
            @foreach ($menus as $menu)
                @php
                    $create_checked = isset($permissions_in_array["create_{$menu->prefix}"]) && $permissions_in_array["create_{$menu->prefix}"] === 'on' ? 'on' : 'off';
                    $delete_checked = isset($permissions_in_array["delete_{$menu->prefix}"]) && $permissions_in_array["delete_{$menu->prefix}"] === 'on' ? 'on' : 'off';
                    $update_checked = isset($permissions_in_array["update_{$menu->prefix}"]) && $permissions_in_array["update_{$menu->prefix}"] === 'on' ? 'on' : 'off';
                    $read_checked   = isset($permissions_in_array["read_{$menu->prefix}"])   && $permissions_in_array["read_{$menu->prefix}"] === 'on' ? 'on' : 'off';
                @endphp

                <div class='card p-3 col-md-4 col-12 col-lg-3 m-2 position-relative'>
                    <h2 class='fs-4 d-flex flex-nowrap justify-content-between'>
                        {{ $menu->name }}
                        <i class='{{$menu->icon }} position-absolute top-0 end-0 m-2 fs-1 text-cm-secondary'></i>
                    </h2>

                    <span class='text-cm-secondary'>{{ $menu->prefix }}</span>

                    <x-input-checkbox-switch name="create_{{ $menu->prefix}}" label='Adicionar' :dchecked='$create_checked' />

                    <x-input-checkbox-switch name="delete_{{ $menu->prefix}}" label='Remover' :dchecked='$delete_checked' />

                    <x-input-checkbox-switch name="read_{{ $menu->prefix}}" label='Visualizar' :dchecked='$read_checked' />

                    <x-input-checkbox-switch name="update_{{ $menu->prefix}}" label='Editar' :dchecked='$update_checked' />
                </div>
            @endforeach
        </div>

        @isset($permissions->extra_permissions)
            <div class='card p-3 col-12 m-2 position-relative'>
                <h2 class='fs-4 d-flex flex-nowrap justify-content-between'>
                    Permissões extras
                    <i class='bi bi-file-earmark-plus-fill position-absolute top-0 end-0 m-2 fs-1 text-cm-secondary'></i>
                </h2>

                @foreach (json_decode($permissions->extra_permissions, true) as $indice => $permissions)
                    <x-input-checkbox-switch :name='$indice' :label='$indice' />
                @endforeach
            </div>
        @endisset

        <div class='p-2' id='extra-permissions'>
            <button type='button' title='Adicionar permissões extras' class='border-0 bg-transparent text-color-main'>Adiconar permissoes extras</button>

            <div hidden>
                <x-text-area name='extra_permissions' icon='bi bi-file-earmark-plus-fill' label='Permissões extra' />
            </div>
        </div>

        <div class='row d-flex justify-content-end align-items-center'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar permição' value='Salvar permição' style='color-main' />
            </div>
        </div>
    </form>
</section>
