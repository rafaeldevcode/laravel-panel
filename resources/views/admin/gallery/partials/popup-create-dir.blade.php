<div class='modal fade' id='create-dir' tabIndex='-1' aria-labelledby='create-dir-label' aria-hidden='true'>
    <form action="/admin/gallery/create/folder" method="POST" class='modal-dialog' enctype="multipart/form-data">
        @csrf
        <div class='modal-content border border-color-main'>
            <div class='modal-header bg-color-main'>
                <h5 class='modal-title text-cm-light' id='create-dir-label'>Adicionar diretório</h5>

                <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
            </div>
            <div class='modal-body p-4'>
                <input type="hidden" name="folder" value="{{ $folder }}">

                <div class='col-12 pb-3'>
                    <x-input-text name='name' label='Nome do diretório' icon='bi bi-pencil-fill' required />
                </div>
            </div>
            <div class="modal-footer">
                <div class='d-flex flex-nowrap justify-content-center align-items-center'>
                    <button title='Fechar modal' type='button' class='btn btn-secondary me-2' data-bs-dismiss='modal'>Fechar</button>
                    <button type="submit" title='Adicionar um novo diretório' type='button' class='btn btn-color-main ms-2 text-cm-light'>Adicionar</button>
                </div>
            </div>
        </div>
    </form>
</div>
