<div class='d-flex align-items-center'>
    @auth
        <form id='menu' class='menu'>
            <input class='d-none menu_input' type='checkbox' id='checkbox-menu'>

            <label class='position-relative d-block ms-2 menu_label' for="checkbox-menu">
                <span class='position-absolute d-block rounded bg-cm-light'>.</span>
                <span class='position-absolute d-block rounded bg-cm-light'>.</span>
                <span class='position-absolute d-block rounded bg-cm-light'>.</span>
            </label>
        </form>
    @endauth
</div>

<script>
    $('#checkbox-menu').click((event) =>{
        oppenClosedMenu(event);
    });
</script>
