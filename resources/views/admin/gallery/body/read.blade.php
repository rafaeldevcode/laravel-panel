<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form class="p-3">
        <div class='w-full md:w-6/12 px-4'>
            <x-input-checkbox-switch name="select_several" label='Selecionar todas' data-button="select-several" />
        </div>
    </form>

    <x-gallery-loop :close="false" :use="false" />
</section>

<x-modal-delete />
<x-gallery-preview />

@section('scripts')
    <script type="text/javascript" src="{{ asset("assets/scripts/class/Gallery.js") }}"></script>
    <script type="text/javascript">
        const gallery = new Gallery("images[]", true);

        gallery.changeInputType('checkbox');
        gallery.dbClickPreview();
        gallery.next($('#image-preview'));
        gallery.previous($('#image-preview'));
    </script>
@endsection
