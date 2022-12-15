<div class='d-flex flex-row align-items-center position-fixed end-0 top-0 m-2 p-2 shadow border border-{{ $type }} border-2 rounded bg-cm-light' data-message='true'>
    <i class="bi {{ $type == 'danger' ? 'bi-x-circle-fill' : 'bi-check-circle-fill' }} text-{{ $type }} me-2"></i>
    <p class='m-0 text-{{ $type }}'>{{ $text }}</p>
</div>

<script type="text/javascript">
    hiddenMessage();
</script>
