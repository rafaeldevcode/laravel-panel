<div class='d-flex flex-column position-relative my-4'>
    <i class='bi bi-lock-fill position-absolute m-2'></i>
    <input class='form-control ps-4 py-2 validit-custom' type='password' name='{{ $name }}' id='{{ $name }}' value='{{ $value }}' {{ $attributes }}>
    <button type='button' data-id="show-pass" title='Exibir senha' class='btn btn-sm btn-show-pass position-absolute end-0 h-100'><i class='bi bi-eye-fill'></i></button>
    <label class='position-absolute ms-4 my-2 px-2' for='{{ $name }}'>{{ $label }}</label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
