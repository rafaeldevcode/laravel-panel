@extends('main')

@section('metasConfig')
    <x-meta-config title='Galeria' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\GalleryActions::handle() }}

            @include("admin/gallery/body/read")
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
