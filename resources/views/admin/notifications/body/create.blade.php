<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/notifications/add">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome da notificação' icon='bi bi-bell-fill' required />
            </div>

            <div class='col-12'>
                <x-tinymce name='notification' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-checkbox-switch name='notification_status' label='Ativar notificação' checked />
            </div>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar notificação' value='Salvar notificação' style='color-main' />
            </div>
        </div>
    </form>
</section>
