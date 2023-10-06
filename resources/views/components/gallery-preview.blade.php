<div data-modal="preview" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="flex justify-between flex-col bg-white rounded p-8 relative w-full h-[100%]" data-modal-body="popup">
        <div class='bg-primary relative p-6 rounded-t'>
            <h5 class='modal-title text-white font-semibold' id='modalGalleryPreviewLabel'>Visualizar imagens</h5>

            <button data-modal-close="popup" class="absolute top-2 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>
        </div>

        <div class='flex flex-col justify-center p-0'>
            <div class="w-full h-full flex justify-center items-center">
                <img id="image-preview" class="gallery-image-preview" src="#" alt="">
            </div>
        </div>

        <div class="flex justify-between p-0">
            <button id="previous" class="border rounded-l border-grey-700 px-2 py-3 h-full bg-transparent rounded-bottom" type="button" title="Imagem anterior">
                <i class="bi bi-arrow-left-short text-gray-800"></i>
            </button>

            <div class="text-start">
                <ul class="m-0 p-0">
                    <li class="text-gray-800"><b>Nome: </b><span id="name"></span></li>
                    <li class="text-gray-800"><b>Link: </b><span id="url"></span></li>
                </ul>
            </div>

            <button id="next" class="border rounded-r m-0 border-grey-700 px-2 py-3 h-full bg-transparent rounded-bottom" type="button" title="Próxima imagem">
                <i class="bi bi-arrow-right-short text-gray-800"></i>
            </button>
        </div>
    </div>
</div>
