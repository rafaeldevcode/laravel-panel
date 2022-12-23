<section class='p-3 p-sm-5 bg-cm-grey m-3 rounded shadow'>
    <section class='custom-table m-auto cm-browser-height'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr>
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Nome</th>
                    <th class='col'>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class='col'>
                            <input
                                data-id='{{ $permission->id }}'
                                data-message='Esta ação irá remover todas as permições selecionadas!''
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <td class='col'>{{ $permission->name }}</td>
                        <td>
                            <a href='/admin/permissions/edit/{{ $permission->id }}' title='Editar permição {{ $permission->name }}' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='/admin/permissions/delete/{{ $permission->id }}'
                                data-message='Esta ação irá remover a permição "{{ $permission->name }}"!'
                                type='button'
                                title='Remover permição {{ $permission->name }}'
                                class='btn btn-sm btn-cm-danger text-cm-light fw-bold m-1'
                            >
                                <i class='bi bi-trash-fill'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($permissions) == 0)
            <div class="p-2 empty-collections d-flex justify-content-center align-items-center">
                <img class="h-100" src="{{ asset('assets/images/empty.svg') }}" alt="Teste">
            </div>
        @endif
    </section>

    <x-pagination
        :next='$permissions->nextPageUrl()'
        :previous='$permissions->previousPageUrl()'
        :current='$permissions->currentPage()'
        :totalpages='$permissions->lastPage()'
    />
    <x-modal-delete />
</section>
