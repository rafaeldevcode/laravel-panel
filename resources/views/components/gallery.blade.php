<div data-modal="gallery" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded p-8 relative w-full h-full overflow-auto max-w-[1000px]" data-modal-body="popup">
        <div class='relative modal-content border border-primary rounded'>
            <div class='bg-primary p-4 rounded-t'>
                <h5 class='text-white font-semibold' id='modalGalleryLabel'>Galeria de imagens</h5>

                <button data-modal-close="popup" class="absolute top-2 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                    <i class="bi bi-x text-2xl"></i>
                </button>
            </div>

            <div class='modal-body d-flex flex-column justify-content-center p-0'>
                <x-gallery-loop :close="true" :use="true" />
            </div>
        </div>
    </div>
</div>
