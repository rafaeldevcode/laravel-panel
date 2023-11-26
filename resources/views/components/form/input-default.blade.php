<div class="my-3">
    <label for="{{ $name }}">{{ $label }}</label>

    <label class="relative block">
        <span class="sr-only">
            {{ $label.$is_required }}
        </span>

        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            @if(isset($icon))
                <i class='{{ $icon }} absolute mr-2 my-2 ml-1 text-secondary'></i>
            @endif
        </span>

        <input
            class="placeholder:italic placeholder:text-secondary block bg-white w-full border border-secondary rounded py-3 pl-9 pr-3 shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1 sm:text-sm"
            placeholder="{{ $label.$is_required }}"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ isset($value) ? $value : '' }}"
            {{ $attributes }}
        />

        @if($type === 'password')
            <button type='button' data-id-pass="show-pass" title='Exibir senha' class='btn-color-main btn-show-pass px-1 rounded-r absolute top-0 right-0 h-full'>
                <i class='bi bi-eye-fill'></i>
            </button>
        @endif

        <span class='absolute right-0 bottom-0 validit'></span>
    </label>
</div>
