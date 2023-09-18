@isset($text)
    <div class='d-flex flex-row align-items-center position-fixed end-0 top-0 m-2 p-2 shadow border border-{{ $type }} border-2 rounded bg-cm-light' data-message='true'>
        <i class="bi {{ $type == 'danger' ? 'bi-x-circle-fill' : 'bi-check-circle-fill' }} text-{{ $type }} me-2"></i>
        <p class='m-0 text-{{ $type }}'>{{ $text }}</p>
    </div>

    {{-- <div class="fixed top-0 right-0 rounded p-4 z-[99999] text-white font-bold max-w-[400px]" data-message="content">
        <div class="rounded shadow-lg p-4 flex items-center relative my-1 bg-<?php echo $_SESSION['type'] ?>" data-message="true">
            <i class="<?php echo getIconMessage($_SESSION['type']) ?> text-xl"></i>
            <p class="ml-4 text-sm"><?php echo $_SESSION['message'] ?></p>
            <i class="bi bi-x absolute top-0 right-1 opacity-75 pointer" data-message="hide"></i>
        </div>
    </div> --}}
@endisset
