<div class="bg-cm-secondary p-3">
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-cm-info text-cm-light m-1" data-folder="back">
            <i class="bi bi-arrow-return-left"></i>
        </button>

        @can('create', 'gallery')
            <button class="btn btn-sm btn-cm-info text-cm-light m-1" {{ empty($folder) ? '' : 'disabled' }} data-bs-toggle="modal" data-bs-target="#create-dir">
                <i class="bi bi-folder-plus"></i>
            </button>

            <button class="btn btn-sm btn-cm-info text-cm-light m-1" data-bs-toggle="modal" data-bs-target="#upload">
                <i class="bi bi-cloud-arrow-up-fill"></i>
            </button>
        @endcan
    </div>
</div>
