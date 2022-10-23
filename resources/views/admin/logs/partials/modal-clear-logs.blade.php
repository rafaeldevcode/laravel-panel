<div class='modal fade' id='modalClearLogs' tabIndex='-1' aria-labelledby='modalClearLogsLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content border border-danger'>
            <form action='/admin/logs/clear' method='POST'>
                <div class='modal-header bg-danger'>
                    <h5 class='modal-title text-cm-light' id='modalClearLogsLabel'>
                        Esta ação irá limpar o arquivo de log!
                    </h5>

                    <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar' />
                </div>

                @csrf
                <input type='hidden' name='file' value='{{ $log_query }}'>

                <div class='modal-body p-4'>
                    <p class='modal-title text-center mb-4 fs-5'>Tem certeza que deseja continuar?</p>

                    <div class='d-flex flex-nowrap justify-content-center align-items-center'>
                        <button title='Fechar modal' type='button' class='btn btn-secondary me-2' data-bs-dismiss='modal'>Fechar</button>
                        <input title='Limpar arquivo de log' type='submit' class='btn btn-danger ms-2' value='Limpar'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
