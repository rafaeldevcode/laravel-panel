<div class='form-check form-switch'>
    <input class='form-check-input' type='checkbox' id='{{ $name }}' name='{{ $name }}' {{ $attributes }} {{ $dchecked == 'on' ? 'checked' : '' }}>
    <label class='form-check-label' for='{{ $name }}'>{{ $label }}</label>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>
