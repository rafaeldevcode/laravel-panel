<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
        <div class='flex justify-between flex-wrap'>
            @csrf
            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='site_name' label='Nome do site' icon='bi bi-globe2' type="text" :value="isset($settings) ? $settings->site_name : null" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='site_description' label='Descrição do site' icon='bi bi-globe2' type="text" :value="isset($settings) ? $settings->site_description : null" required />
            </div>
        </div>

        <div class='w-full flex flex-wrap mt-6'>
            <x-button-upload name="site_logo_main" label="Logo principal (Cor principal)" :value="isset($settings) ? $settings->site_logo_main : null" />

            <x-button-upload name="site_logo_secondary" label="Logo segundário (Na cor branca)" :value="isset($settings) ? $settings->site_logo_secondary : null" />

            <x-button-upload name="site_favicon" label="Favicon do site" :value="isset($settings) ? $settings->site_favicon : null" />

            <x-button-upload name="site_bg_login" label="Fundo da tela de login" :value="isset($settings) ? $settings->site_bg_login : null" />
        </div>

        <div class='flex justify-end'>
            <x-input-button type='submit' title='Salvar' value='Salvar configurações' style='color-main' />
        </div>
    </form>
</section>

<x-gallery />

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Gallery.js') }}"></script>
    <script type="text/javascript">
        const gallery = new Gallery();

        gallery.openModalSelect($('[data-upload=site_logo_main]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_logo_secondary]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_favicon]'), 'radio');
        gallery.openModalSelect($('[data-upload=site_bg_login]'), 'radio');
    </script>
@endsection
