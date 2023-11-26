<div class="my-3">
    <label for="{{ $name }}">{{ $label }}</label>

    <div class='flex flex-col relative'>
        @if(isset($icon))
            <i class='{{ $icon }} absolute m-2 text-secondary'></i>
        @endif

        <textarea
            id="{{ $name }}"
            rows="4"
            {{ $attributes }}
            class="pl-8 placeholder:italic placeholder:text-secondary block p-2 w-full text-sm text-secondary rounded border border-secondary shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1"
            placeholder="{{ $label.$is_required }}"
        >{{ isset($value) ? $value : '' }}</textarea>

        <span class='absolute right-0 bottom-0 validit'></span>
    </div>
</div>
