<section class="p-3 bg-light m-0 sm:m-3 rounded shadow-lg">
    <section class="custom-table m-auto cm-browser-height">
        <div class="relative overflow-x-auto rounded border">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input
                                    data-button="select-several"
                                    id="checkbox-all-search"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                >
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Thumb
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input
                                        value="{{ $user->id }}"
                                        data-message-delete="Esta ação irá remover todos os usuários selecionados!"
                                        type="checkbox"
                                        data-button="delete-enable"
                                        id="checkbox-table-search-{{ $user->id }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label for="checkbox-table-search-{{ $user->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row">
                                <div class="user">
                                    <img class="w-100" src="{{ asset("assets/images/users/{$user->avatar}") }}" alt="{{ $user->name }}">
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="rounded text-xs text-light px-2 py-1 bg-{{ StatusEnum::color($user->user_status) }}">
                                    {{ StatusEnum::name($user->user_status) }}
                                </span>
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 space-x-2 right">
                                <a href="/admin/users/edit/{{ $user->id }}" title="Editar usuário {{ $user->name }}" class="text-xs p-2 rounded btn-primary text-light fw-bold">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route="/admin/users/delete"
                                    data-delete-id="{{ $user->id }}"
                                    data-message-delete="Esta ação irá remover o usuário '{{ $user->name }}'!"
                                    type="button"
                                    title="Remover usuário {{ $user->name }}"
                                    class="p-2 text-xs rounded btn-danger text-light fw-bold"
                                >
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(count($users) == 0)
            <div class="p-2 empty-collections flex justify-center items-center">
                <img class="h-full" src="{{ asset('assets/images/empty.svg') }}" alt="Nenhum dado encontrado">
            </div>
        @endif
    </section>

    <x-pagination
        :next="$users->nextPageUrl()"
        :previous="$users->previousPageUrl()"
        :current="$users->currentPage()"
        :totalpages="$users->lastPage()"
    />
</section>

<x-modal-delete />
