@php
    $count = count($files);
@endphp

<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <div class="d-flex flex-wrap">
        @foreach($folders as $folder)
            <div class="m-2 card-folder-image text-center">
                <div role="button" tabindex="0" class="position-relative folder-folder">
                    @can('delete', 'gallery')
                        <div class="position-absolute top-0 end-0" id="options-folder">
                            <form action="/admin/gallery/folder/remove" method="POST">
                                @csrf
                                <input type="hidden" name="folder_name" value="{{ $folder }}">

                                <button class="btn btn-sm bg-tansparent text-cm-danger border-0" type="submit" title="Remover este diretório">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    @endcan

                    <div class="d-flex flex-column">
                        <i class="bi bi-folder-fill display-2 text-color-main" data-gallery-folder="{{ $folder }}"></i>
                        <span class="badge bg-color-main folder-image-name">{{ explode('/', $folder)[count(explode('/', $folder))-1] }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach($files as $indice => $file)
            <div class="position-relative card-folder-image folder-image m-2 text-center" role="button" tabindex="0"
                data-gallery="open"
                data-gallery-type="{{ $file->type }}"
                data-gallery-src="{{ $file->path }}"
                data-gallery-title="{{ $file->title }}"
                data-gallery-current="{{ $indice }}"
                data-gallery-count="{{ $count }}"
                data-gallery-size="undefined">

                @if ($file->type == 'image')
                    <img class="border border-color-main" src='{{ asset("storage/$file->path") }}' alt="{{ $file->path }}">
                @else
                    <div class="gallery-video">
                        <video class="border border-color-main" src="{{ asset("storage/$file->path") }}"></video>
                        <i class="bi bi-play-circle-fill fs-2 text-color-main"></i>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <section hidden class="gallery-view fixed-top w-100 h-100 justify-content-center align-items-center" data-gallery="content">
        <div class="gallery-view-carousel bg-cm-light border border-cm-secondary rounded shadow d-flex flex-column justify-content-between">
            <div class="p-2 border-bottom border-cm-grey d-flex flex-row justify-content-between align-items-center">
                <h2 class="text-cm-secondary">Galeria de imagens</h2>

                <button class="btn border border-cm-grey" data-gallery="close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="gallery-view-carousel-body w-100 h-100 position-relative">
                <div hidden class="w-100 h-100 justify-content-center align-items-center">
                    <video id="video" class="gallery-view-carousel-body-video" src="#" controls></video>
                </div>

                <div hidden class="w-100 h-100 justify-content-center align-items-center">
                    <img id="img" class="gallery-view-carousel-body-image" src='#' alt="#">
                </div>

                <button data-gallery="prev" class="gallery-view-carousel-body-btn gallery-view-carousel-body-left position-absolute top-0 left-0 h-100 px-3 border-0">
                    <i class="bi bi-arrow-bar-left fs-4 text-cm-light"></i>
                </button>

                <button data-gallery="next" class="gallery-view-carousel-body-btn gallery-view-carousel-body-right position-absolute top-0 end-0 h-100 px-3 border-0">
                    <i class="bi bi-arrow-bar-right fs-4 text-cm-light"></i>
                </button>
            </div>

            <div class="p-2 border-top border-cm-grey d-flex flex-row justify-content-between align-items-center">
                <ul class="m-0 p-0 d-flex flex-row text-cm-secondary">
                    <li data-gallery-options="title"></li>
                    <li class="mx-1">|</li>
                    <li data-gallery-options="size"></li>
                </ul>

                <div class="d-flex flex-row">
                    @can('delete', 'gallery')
                        <form action="/admin/gallery/image/remove" method="POST">
                            @csrf
                            <input data-gallery="input" type="hidden" name="path" value="">

                            <button class="btn btn-sm btn-cm-danger text-cm-light mx-1" type="submit" title="Remover esta imagem">
                                <i class="bi bi-trash-fill fs-icon-image"></i>
                            </button>
                        </form>
                    @endcan

                    @can('read', 'gallery')
                        <form action="/admin/gallery/image/dowload" method="POST">
                            @csrf
                            <input data-gallery="input" type="hidden" name="path" value="">

                            <button class="btn btn-sm btn-cm-success text-cm-light" type="submit" title="Baixar esta imagem">
                                <i class="bi bi-arrow-down-square-fill fs-icon-image"></i>
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </section>

    @if(count($files) == 0 && count($folders) == 0)
        <div class="p-2 empty-collections d-flex justify-content-center align-items-center">
            <img class="h-100" src="{{ asset('assets/images/empty.svg') }}" alt="Teste">
        </div>
    @endif
</section>
