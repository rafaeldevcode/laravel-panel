<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form method="POST" action="{{ isset($permission) ? route('permissions.update', ['ID' => $permission->id]) : route('permissions.store') }}">
        @csrf

        <div class='flex justify-between mb-4 px-4'>
            <div class='w-full md:w-6/12'>
                <x-input-default name='name' label='Nome da permição' icon='bi bi-file-earmark-lock-fill' type="text" :value="isset($permission) ? $permission->name : null" required />
            </div>
        </div>

        <div class='flex flex-wrap'>
            @foreach ($menus as $menu)
                @php
                    $create = isset($permission) && isset($permissions_in_array["create_{$menu->prefix}"]) ? $permissions_in_array["create_{$menu->prefix}"] : null;
                    $delete = isset($permission) && isset($permissions_in_array["delete_{$menu->prefix}"]) ? $permissions_in_array["delete_{$menu->prefix}"] : null;
                    $update = isset($permission) && isset($permissions_in_array["update_{$menu->prefix}"]) ? $permissions_in_array["update_{$menu->prefix}"] : null;
                    $read = isset($permission) && isset($permissions_in_array["read_{$menu->prefix}"]) ? $permissions_in_array["read_{$menu->prefix}"] : null;
                @endphp

                <div class=" w-full lg:w-3/12 md:w-4/12 p-4">
                    <div class='rounded shadow-lg border border-color-main p-3 relative flex flex-col'>
                        <h2 class='text-2xl font-semibold flex flex-nowrap justify-between'>
                            {{ $menu->name }}
                            <i class='{{$menu->icon}} absolute top-0 end-0 m-2 text-6xl text-secondary'></i>
                        </h2>

                        <span class='text-cm-secondary mb-4'>{{ $menu->prefix }}</span>

                        <x-input-checkbox-switch name="create_{{ $menu->prefix}}" label='Adicionar' :value="$create" />

                        <x-input-checkbox-switch name="delete_{{ $menu->prefix}}" label='Remover' :value="$delete" />

                        <x-input-checkbox-switch name="read_{{ $menu->prefix}}" label='Visualizar' :value="$read" />

                        <x-input-checkbox-switch name="update_{{ $menu->prefix}}" label='Editar' :value="$update" />
                    </div>
                </div>
            @endforeach
        </div>

        <div class="px-4">
            <x-text-area name='extra_permissions' icon='bi bi-file-earmark-plus-fill' label='Permissões extra' :value="isset($permission) ? $permission->extra_permissions : null" />
        </div>

        <div class='flex justify-end px-4'>
            <x-input-button type='submit' title='Salvar permição' value='Salvar permição' style='color-main' />
        </div>
    </form>
</section>
