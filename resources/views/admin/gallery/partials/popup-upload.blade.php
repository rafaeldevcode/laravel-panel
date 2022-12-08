<div class='modal fade' id='upload' tabIndex='-1' aria-labelledby='upload-label' aria-hidden='true'>
    <form action="/admin/gallery/upload" method="POST" class='modal-dialog' enctype="multipart/form-data">
        @csrf
        <div class='modal-content border border-color-main'>
            <div class='modal-header bg-color-main'>
                <h5 class='modal-title text-cm-light' id='upload-label'>Realizar upload de uma imagem</h5>

                <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
            </div>
            <div class='modal-body p-4'>
                <input type="hidden" name="folder" value="{{ $folder }}">

                <div class='col-12 pb-3'>
                    <x-input-text name='name' label='Nome para a imagem' icon='bi bi-pencil-fill' required />
                </div>

                <div class='col-12'>
                    <x-input-file-archive name='image' label='Escolher uma imagem' icon='bi bi-image-fill' required />
                </div>
            </div>
            <div class="modal-footer">
                <div class='d-flex flex-nowrap justify-content-center align-items-center'>
                    <button title='Fechar modal' type='button' class='btn btn-secondary me-2' data-bs-dismiss='modal'>Fechar</button>
                    <button type="submit" title='Realizar upload de uma imagem' type='button' class='btn btn-color-main ms-2 text-cm-light'>Adicionar</button>
                </div>
            </div>
        </div>
    </form>
</div>
