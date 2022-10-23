<section class='p-3 p-md-5 bg-cm-grey m-3 rounded shadow'>
    <div class='border-bottom border-cm-secondary d-flex justify-content-center'>
        <ul class='p-0 m-0 d-flex flex-row'>
            @foreach ($logs_files as $file)
                <li>
                    <a class='link-log {{ str_replace('.log', '', $file) === $log_query ? 'text-color-main border-bottom border-color-main' : 'text-cm-secondary' }} text-decoration-none d-block px-3' href='/admin/logs?log={{ str_replace('.log', '', $file) }}'>{{ ucfirst(str_replace('.log', '', $file)) }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <article class='mt-4 bg-cm-secondary rounded py-3 pe-3 ps-5'>
        <code class='text-cm-light block-log d-block m-auto'>
            @if(empty($logs))
                <div>
                    <h3 class='text-center'>Nenhum log para mostar</h3>
                </div>
            @else
                <div class='mb-4'>
                    <h3 class='text-center'>{{ ucfirst($log_query) }}</h3>
                </div>
            @endif

            @foreach ($logs as $indice => $log)
                <div class='d-flex flex-row'>
                    <span>{{ $indice+1 }}|</span>
                    <p class='ps-2 m-0'>{{ $log }}</p>
                </div>
            @endforeach
        </code>
    </article>

    <div class='mt-4 d-flex justify-content-end'>
        <button type='button' class='btn btn-cm-danger text-cm-light' title='Limpar arquivo de logs' data-bs-toggle='modal' data-bs-target='#modalClearLogs'>
            Limpar arquivo
        </button>
    </div>
</section>
