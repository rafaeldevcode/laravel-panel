
<section class='p-3 p-sm-5 bg-cm-grey m-3 rounded shadow'>
    <section class='custom-table m-auto'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr>
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Nome</th>
                    {{-- <th class='col'>Usuário</th> --}}
                    <th class='col'>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td class='col'>
                            <input
                                data-id='{{ $notification->id }}'
                                data-message='Esta ação irá remover todas as notificações selecionadas!'
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <td>{{ $notification->name }}</td>
                        {{-- <td>{{ $notification->name }}</td> --}}
                        <td>
                            <a href='/admin/notifications/edit/{{ $notification->id }}' title='Editar nitificação {{ $notification->name }}' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='/admin/notifications/delete/{{ $notification->id }}'
                                data-message='Esta ação irá remover a nitificação "{{ $notification->name }}"!'
                                type='button'
                                title='Remover nitificação {{ $notification->name }}'
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

    <x-table-footer />
    <x-modal-delete />
</section>
