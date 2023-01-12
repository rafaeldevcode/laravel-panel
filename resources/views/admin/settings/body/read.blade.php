<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" accept="/admin/settings/edit" enctype="multipart/form-data">
        <div class='row d-flex justify-content-between'>
            @csrf
            <div class='col-12 col-md-6'>
                <x-input-text name='site_name' label='Nome do site' icon='bi bi-globe2' value='{{ $settings->site_name }}' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='site_description' label='Descrição do site' icon='bi bi-globe2' value='{{ $settings->site_description }}' required />
            </div>

            <div class='col-12 d-flex flex-wrap mt-2'>
                <x-input-file-image name='site_logo' label='Logo principal do site' icon='bi bi-card-image' :src='$images["site_logo"]' />

                <x-input-file-image name='site_logo_header' label='Logo do cabeçalho site' icon='bi bi-card-image' :src='$images["site_logo_header"]' />

                <x-input-file-image name='site_favicon' label='Favicon do site (Formato PNG)' icon='bi bi-card-image' :src='$images["site_favicon"]' />

                <x-input-file-image name='site_bg_login' label='Fundo da tela de login' icon='bi bi-card-image' :src='$images["site_bg_login"]' />
            </div>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar' value='Salvar configurações' style='color-main' />
            </div>
        </div>
    </form>
</section>
