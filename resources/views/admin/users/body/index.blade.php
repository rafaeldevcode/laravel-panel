<section class='p-3 p-sm-5 bg-cm-grey m-3 rounded shadow'>
    <section class='custom-table m-auto'>
        <table class='table table-hover mb-0'>
            <thead>
                <tr>
                    <th class='col'>
                        <input type='checkbox' data-button="select-several" />
                    </th>
                    <th class='col'>Thumb</th>
                    <th class='col'>Nome</th>
                    <th class='col' data-row='email'>Email</th>
                    <th class='col'>Status</th>
                    <th class='col'>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class='col'>
                            <input
                                data-id='{{ $user->id }}'
                                data-message='Esta ação irá remover todos os usuários selecionados!'
                                type='checkbox'
                                data-button="delete-enable"
                            />
                        </td>
                        <th scope='row'>
                            <div class='user'>
                                <img class='w-100' src='{{ asset(!empty($user->avatar) ? '/assets/images/users/'.$user->avatar  : '/assets/images/users/default.png') }}' alt='{{ $user->name }}'>
                            </div>
                        </th>
                        <td>{{ $user->name }}</td>
                        <td data-col='email'>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-cm-{{ App\Enums\UserStatus::getColor($user->user_status) }}">{{ App\Enums\UserStatus::getMessage($user->user_status) }}</span>
                        </td>
                        <td>
                            <a href='/admin/users/edit/{{ $user->id }}' title='Editar usuário {{ $user->name }}' class='btn btn-sm btn-cm-primary text-cm-light fw-bold m-1'>
                                <i class='bi bi-pencil-square'></i>
                            </a>

                            <button
                                data-button="delete"
                                data-route='/admin/users/delete/{{ $user->id }}'
                                data-message='Esta ação irá remover o usuário "{{ $user->name }}"!'
                                type='button'
                                title='Remover usuário {{ $user->name }}'
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
        :next='$users->nextPageUrl()'
        :previous='$users->previousPageUrl()'
        :current='$users->currentPage()'
        :totalpages='$users->lastPage()'
    />
    <x-modal-delete />
</section>
