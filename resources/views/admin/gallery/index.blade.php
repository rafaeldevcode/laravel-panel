@extends('main')

@section('metasConfig')
    <x-meta-config title='Galeria' description='' />
@endsection

@section('content')
    @isset($message)
        <x-message :type='$type' :text='$message' />
    @endisset

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    color='cm-secondary'
                    icon='bi bi-images'
                    title='Galeria'
                    type='Visualizar'
                />

                @include('admin/gallery/partials/sub-breadcrumps')
            </section>

            @include('admin/gallery/body/index')
        </section>
    </section>

    <x-footer />
    @include('admin/gallery/partials/popup-upload')
    @include('admin/gallery/partials/popup-create-dir')
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        backFolder();
        openFolder();
        openGallery();
    </script>
@endsection
