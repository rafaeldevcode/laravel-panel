<section class='p-2 p-md-2 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/menus/add">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome do item do menu' icon='bi bi-menu-button-wide-fill' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='icon' label='Ícone' icon='bi bi-emoji-smile' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='slug' label='Slug (Sem espaçoe e ascentos)' icon='bi bi-link' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-number name='position' label='Posição' icon='bi bi-123' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-checkbox-switch name="view_dashboard" label='Exibir na dashboard' />
            </div>
        </div>

        <div class='row d-flex justify-content-end mt-3'>
            <span>Os ícones ultilizados são do <a href="https://icons.getbootstrap.com" target='_blank' rel='noopener'>bootstrap icons</a>, copie a classe e cole no input do ícone do menu.</span>

            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar menu' value='Salvar menu' style='color-main' />
            </div>
        </div>
    </form>
</section>
