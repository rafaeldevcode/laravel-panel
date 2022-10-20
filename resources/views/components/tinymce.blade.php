<div class='d-flex flex-column position-relative my-4'>
    <textarea name='{{ $name }}' id='{{ $name }}' >{{ $value }}</textarea>
    <span class='position-absolute end-0 bottom-0 validit'></span>
</div>

<script src="{{ asset('/libs/tinymce/tinymce.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#notification'
    });
</script>
