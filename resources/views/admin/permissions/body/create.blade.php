<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/permissions/add">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome da permição' icon='bi bi-file-earmark-lock-fill' required />
            </div>
        </div>

        <div class='d-flex flex-wrap justify-content-evenly'>
            @foreach ($menus as $menu)
                <div class='card p-3 col-md-4 col-12 col-lg-3 m-2 position-relative'>
                    <h2 class='fs-4 d-flex flex-nowrap justify-content-between'>
                        {{ $menu->name }}
                        <i class='{{$menu->icon}} position-absolute top-0 end-0 m-2 fs-1 text-cm-secondary'></i>
                    </h2>

                    <span class='text-cm-secondary'>{{ $menu->prefix }}</span>

                    <x-input-checkbox-switch name="create_{{ $menu->prefix}}" label='Adicionar' checked />

                    <x-input-checkbox-switch name="delete_{{ $menu->prefix}}" label='Remover' checked />

                    <x-input-checkbox-switch name="read_{{ $menu->prefix}}" label='Visualizar' checked />

                    <x-input-checkbox-switch name="update_{{ $menu->prefix}}" label='Editar' checked />
                </div>
            @endforeach
        </div>

        <div>
            <x-text-area name='extra_permissions' icon='bi bi-file-earmark-plus-fill' label='Permissões extra' />
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar permição' value='Salvar permição' style='color-main' />
            </div>
        </div>
    </form>
</section>
