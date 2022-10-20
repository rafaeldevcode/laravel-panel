<div class='d-flex flex-column position-relative my-4'>
    <i class='{{ $icon }} position-absolute m-2'></i>
    <select class='form-select ps-4 focus-shadown-none' name='{{ $name }}' id='{{ $name }}' {{ $attributes }}>
        @isset($value)
            <option  value='default'>{{ $value }}</option>
        @endisset

        @foreach ($array as $indice => $value)
            <option value='{{ $indice }}'>{{ $value }}</option>
        @endforeach
    </select>
    <label class='position-absolute ms-4 my-2 px-2 input-transform-translate' for='permission'>{{ $label }}</label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
