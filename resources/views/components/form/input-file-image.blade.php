<div class='d-flex flex-column my-4 section-input mx-auto'>
    <input class='form-control ps-4 py-2 validit-custom' hidden type='file' name='{{ $name }}' id='{{ $name }}' value='{{ $value }}' {{ $attributes }}>
    <label class='no-transform-translate mt-4 w-100 h-100 my-2 p-3 section-input-label rounded border border-color-main position-relative d-flex justify-content-center align-items-center' for='{{ $name }}'>
        <span class="position-absolute left-0 top-0 section-input-span">
            <i class='{{ $icon }}'></i>
            {{ $label }}
        </span>
        <img class="section-input-image" src='{{ asset("{$src}") }}' alt='{{ $label }}'>
    </label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
