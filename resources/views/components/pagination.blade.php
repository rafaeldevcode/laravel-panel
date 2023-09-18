<section class='w-full border-t-2 border-secondary'>
    <div class='pt-2 flex justify-between'>
        <form action="" method="POST">
            @if(!is_null($previous))
                <input type="hidden" name="page" value="{{ $previous }}">
            @endif

            @if(isset($search))
                <input type="hidden" name="search" value="{{ $search }}">
            @endif

            <button type="submit" title='Página anterior' class='btn btn-secondary' {{ is_null($previous) ? 'disabled' : '' }}>
                <i class='bi bi-arrow-left-short'></i>
                Anterior
            </button>
        </form>

        <div class='flex items-center'>
            <div class='px-2 me-1 border-t-2 border-color-main'>
                {{ $current }}
            </div>
            <div class='border-t-2 border-secondary'>de {{ $totalpages }}</div>
        </div>

        <form action="" method="POST">
            @csrf
            @if(!is_null($next))
                <input type="hidden" name="page" value="{{ $next }}">
            @endif

            @if(isset($search))
                <input type="hidden" name="search" value="{{ $search }}">
            @endif

            <button type="submit" title='Próxima página' class='btn btn-secondary' {{ is_null($next) ? 'disabled' : '' }}>
                Próximo
                <i class='bi bi-arrow-right-short'></i>
            </button>
        </form>
    </div>
</section>
