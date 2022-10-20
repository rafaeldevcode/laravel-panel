<div class='d-flex flex-column position-relative my-4'>
    <i class='{{ $icon }} position-absolute m-2'></i>
    <textarea class='form-control ps-4 py-2 validit-custom' name='{{ $name }}' id='{{ $name }}' {{ $attributes }}>{{ $value }}</textarea>
    <label class='position-absolute ms-4 my-2 px-2' for='{{ $name }}'>{{ $label }}</label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
