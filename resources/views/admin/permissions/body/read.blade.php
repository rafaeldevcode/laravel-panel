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
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                >
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input
                                        value="{{ $permission->id }}"
                                        data-message-delete="Esta ação irá remover todas as permisões selecionados!"
                                        type="checkbox"
                                        data-button="delete-enable"
                                        id="checkbox-table-search-{{ $permission->id }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-{{ $permission->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $permission->name }}
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 space-x-2 right">
                                <a href="{{ route('permissions.edit', ['ID' => $permission->id]) }}" title="Editar permisão {{ $permission->name }}" class="text-xs p-2 rounded btn-primary text-light fw-bold">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route="{{ route('permissions.destroy') }}"
                                    data-delete-id="{{ $permission->id }}"
                                    data-message-delete="Esta ação irá remover o permisão '{{ $permission->name }}'!"
                                    type="button"
                                    title="Remover permisão {{ $permission->name }}"
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

        @if(count($permissions) == 0)
            <div class="p-2 empty-collections flex justify-center items-center">
                <img class="h-full" src="{{ asset('assets/images/empty.svg') }}" alt="Nenhum dado encontrado">
            </div>
        @endif
    </section>

    <x-pagination
        :next="$permissions->nextPageUrl()"
        :previous="$permissions->previousPageUrl()"
        :current="$permissions->currentPage()"
        :totalpages="$permissions->lastPage()"
    />
</section>

<x-modal-delete />
