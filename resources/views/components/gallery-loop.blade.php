<div>
    <x-preloader />

    <div class="flex justify-center flex-wrap" id="gallery">
        @foreach ($images as $image)
            <div class="m-2 gallery">
                <input
                    hidden
                    id="image_{{ $image->id }}"
                    value='{{ $image->id }}'
                    data-message-delete='Esta ação irá remover todas as imagens selecionados!'
                    type='checkbox'
                    data-button="delete-enable"
                    data-checked="add-style"
                >

                <label class="form-check-label block rounded cursor-pointer border border-grey-700 p-1" data-click="double" for="image_{{ $image->id }}">
                    <img class="rounded" src="{{ asset("storage/{$image->file}") }}" alt="{{ $image->name }}">
                </label>
            </div>
        @endforeach

        <div class="p-4 mt-4 mx-4 rounded w-full border-grey-700 text-center border {{ count($images) == 0 ? '' : 'hidden' }}" data-gallery="empty">
            <h2>{{ __('Nenhuma imagem encontrada!') }}</h2>
        </div>
    </div>

    <?php if($images->hasMorePages()): ?>
        <div class="flex mt-3 justify-center">
            <button data-search="{{ isset($search) ? $search : '' }}" data-next-page="{{ $images->currentPage()+1 }}" class="btn px-3 py-2 btn-sm btn-primary text-cm-light fw-bold" type="button" title="Load more images">
                Carregar mais
            </button>
        </div>
    <?php endif ?>

    <div class="border-t border-grey-700 pt-3 flex justify-between items-start sm:items-center flex-col sm:flex-row mt-3 p-3">
        <div>
            <ul class="m-0 p-0 text-gray-800">
                <li><strong>Total:</strong> <span id="count-images">{{ $total }}</span> imagens</li>
                <li><strong>Exibindo:</strong> <span id="displaying-images">{{ count($images) }}</span> imagens</li>
            </ul>
        </div>

        <div class="mt-3 sm:mt-0 mx-auto sm:mx-0">
            <span class="text-gray-800">Máximo de 20 arquivos</span>

            <form class="flex flex-row justify-center sm:justify-end items-end">
                @csrf
                <input type="file" id="input-upload" hidden accept=".svg, .jpg, .jpeg, .png, .webp" multiple>

                @if (isset($close) && $close == true)
                    <button title='Fechar modal' type='button' class='btn btn-danger' data-modal-close="popup">Fechar</button>
                @endif

                <div class="flex flex-col <?php echo isset($use) ? 'mx-1' : '' ?>">
                    <button title="Realiar upload" type="button" class="btn btn-primary text-gray-800 font-bold" id="upload">
                        {{ isset($text_button) ? $text_button : '' }}
                        <i class="bi bi-upload"></i>
                    </button>
                </div>

                @if (isset($use) && $use == true)
                    <button disabled title='Selecionar umagem' type='button' class='btn btn-success text-gray-800' id="selected">Selecionar</button>
                @endif
            </form>
        </div>
    </div>
</div>
