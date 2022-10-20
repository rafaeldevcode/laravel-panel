<div class='modal fade' id='modalDeleteItem' tabIndex='-1' aria-labelledby='modalDeleteItemLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content border border-danger'>
            <div class='modal-header bg-danger'>
                <h5 class='modal-title text-cm-light' id='modalDeleteItemLabel'></h5>

                <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
            </div>
            <form data-submit="delete">
                @csrf
            </form>
            <div class='modal-body p-4'>
                <p class='modal-title text-center mb-4 fs-5'>Tem certeza que deseja continuar?</p>

                <div class='d-flex flex-nowrap justify-content-center align-items-center'>
                    <button title='Fechar modal' type='button' class='btn btn-secondary me-2' data-bs-dismiss='modal'>Fechar</button>
                    <button data-submit="button" title='Remover usuário' type='button' class='btn btn-danger ms-2'>Remover</button>
                </div>
            </div>
        </div>
    </div>
</div>
