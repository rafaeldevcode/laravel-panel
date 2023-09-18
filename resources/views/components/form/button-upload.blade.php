<div class="flex flex-col relative">
    <label for="{{ $name }}" class="text-secondary ms-2">
        {{ $label }}
        <span class="text-danger">{{ $is_required }}</span>
    </label>

    <button id="{{ $name }}" type="button" title="Open modal gallery" class="border border-primary rounded m-2 px-4 py-2 bg-white" data-upload="{{ $name }}">
        <img class="w-full rounded" src="{{ asset('assets/images/select-files.png') }}" alt="Open gallery">
    </button>

    <div class="flex flex-wrap" data-upload-selected="{{ $name }}" data-required="{{ isset($is_required) ? 'required' : '' }}">
        <!-- Add this snippet only when creating a new record and it is mandatory - start -->
        @if (isset($is_required) && !isset($images))
            <div class="m-2 gallery rounded">
                <input value="" type="text" hidden name="{{ $type == 'checkbox' ? "{$name}[]" : $name }}" data-checked="add-style" {{ $attributes  }}>
                <span class='absolute left-0 top-0 mt-5 validit'></span>
            </div>
        @endif
        <!-- Add this snippet only when creating a new record and it is mandatory - end -->

        @isset($images)
            @foreach ($images as $image)
                <div class="m-2 gallery rounded">
                    <input value="{{ $image->id }}" type="text" hidden name="{{ $type == 'checkbox' ? "{$name}[]" : $name }}" data-checked="add-style" {{ $attributes  }}>

                    <div class="relative" data-upload-image="selected">
                        <div class="bg-primary flex justify-end p-1 w-full rounded-t">
                            <button type="button" title="Remover imagem" class="border-0 bg-transparent p-0" data-upload-image="remove">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </div>

                        <img class="w-full rounded-b" src="{{ asset("storage/{$image->file}") }}" alt="{{ $image->name }}">
                    </div>

                    @isset($is_required)
                        <span class='absolute left-0 top-0 mt-5 validit'></span>
                    @endisset
                </div>
            @endforeach
        @endisset
    </div>
</div>
