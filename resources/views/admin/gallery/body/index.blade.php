<section class='p-3 p-md-5 bg-cm-grey m-3 rounded shadow'>
    <div class="d-flex flex-wrap">
        @foreach($folders as $indice => $folder)
            <div class="m-2 card-folder-image text-center">
                <div role="button" tabindex="0" class="position-relative folder-folder">
                    <div class="position-absolute top-0 end-0" id="options-folder">
                        <form action="/admin/gallery/folder/remove" method="POST">
                            @csrf
                            <input type="hidden" name="folder_name" value="{{ $indice }}">

                            <button class="btn btn-sm bg-tansparent text-cm-danger border-0" type="submit" title="Remover este diretório">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </div>

                    <div class="d-flex flex-column">
                        <i class="bi bi-folder-fill display-2 text-color-main" data-gallery="{{ $indice }}"></i>
                        <span class="badge bg-color-main folder-image-name">{{ explode('/', $indice)[count(explode('/', $indice))-1] }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach($files as $file)
            <div class="position-relative card-folder-image folder-image m-2 text-center" role="button" tabindex="0">
                <div class="w-100 h-100 position-absolute top-0 end-0 d-flex justify-content-center align-items-start" id="options-image">
                    <a href="#" class="btn btn-sm btn-cm-info text-cm-light disabled">
                        <i class="bi bi-eye-fill fs-icon-image"></i>
                    </a>

                    <form action="/admin/gallery/image/remove" method="POST">
                        @csrf
                        <input type="hidden" name="image" value="{{ $file->image }}">

                        <button class="btn btn-sm btn-cm-danger text-cm-light mx-1" type="submit" title="Remover esta imagem">
                            <i class="bi bi-trash-fill fs-icon-image"></i>
                        </button>
                    </form>

                    <form action="/admin/gallery/image/dowload" method="POST">
                        @csrf
                        <input type="hidden" name="image" value="{{ $file->image }}">

                        <button class="btn btn-sm btn-cm-success text-cm-light" type="submit" title="Baixar esta imagem">
                            <i class="bi bi-arrow-down-square-fill fs-icon-image"></i>
                        </button>
                    </form>
                </div>

                <img class="border border-color-main" src='{{ asset("storage/$file->image") }}' alt="{{ $file->name }}">
                {{-- <span class="badge bg-color-main folder-image-name">{{ $file->name }}</span> --}}
            </div>
        @endforeach
    </div>
</section>
