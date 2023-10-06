<div class='flex items-center'>
    @auth
        <form id='menu' class='menu'>
            <input class='hidden menu_input' type='checkbox' id='checkbox-menu'>

            <label class='relative block ml-2 menu_label' for="checkbox-menu">
                <span class='absolute block rounded bg-light'>.</span>
                <span class='absolute block rounded bg-light'>.</span>
                <span class='absolute block rounded bg-light'>.</span>
            </label>
        </form>
    @endauth
</div>
