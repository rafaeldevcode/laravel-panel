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

        <div class='flex justify-end'>
            <x-input-button type='submit' title='Salvar' value='Salvar configurações' style='color-main' />
        </div>
    </form>
</section>
