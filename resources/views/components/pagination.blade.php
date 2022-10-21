<section class='w-100 border-top border-2 border-dark'>
    <div class='pt-2 d-flex justify-content-between'>
        <a href='{{ $previous }}' title='Página anterior' class='btn btn-sm btn-cm-secondary @if(is_null($previous)) disabled @endif'>
            <i class='bi bi-arrow-left-short'></i>
            Anterior
        </a>

        <div class='d-flex'>
            <div class='px-2 me-1 border-top border-2 border-color-main'>
                {{ $current }}
            </div>
            <div class='border-top border-2 border-cm-grey'>de {{ $totalpages }} páginas</div>
        </div>

        <a href='{{ $next }}' title='Próxima página' class='btn btn-sm btn-cm-secondary @if(is_null($next)) disabled @endif'>
            Próximo
            <i class='bi bi-arrow-right-short'></i>
        </a>
    </div>
</section>
