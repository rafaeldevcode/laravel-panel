<section class='p-3 p-sm-5 bg-cm-grey m-3 rounded shadow'>
    <section class='custom-table m-auto'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr>
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Ícone</th>
                    <th class='col'>Nome</th>
                    <th class='col'>Slug</th>
                    <th class='col'>Posição</th>
                    <th class='col'>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td class='col'>
                            <input
                                data-id='{{ $menu->id }}'
                                data-message='Esta ação irá remover todos os items selecionados!'
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <td><i class='{{ $menu->icon }}'></i></td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->slug }}</td>
                        <td>{{ $menu->position }}</td>
                        <td>
                            <a href='/admin/menus/edit/{{ $menu->id }}' title='Editar item {{ $menu->name }} do menu' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='/admin/menus/delete/{{ $menu->id }}'
                                data-message='Esta ação irá remover o item "{{ $menu->name }}" do menu!'
                                type='button'
                                title='Remover item {{ $menu->name }} do menu'
                                class='btn btn-sm btn-cm-danger text-cm-light fw-bold m-1'
                            >
                                <i class='bi bi-trash-fill'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <x-pagination
        :next='$menus->nextPageUrl()'
        :previous='$menus->previousPageUrl()'
        :current='$menus->currentPage()'
        :totalpages='$menus->lastPage()'
    />
    <x-modal-delete />
</section>
