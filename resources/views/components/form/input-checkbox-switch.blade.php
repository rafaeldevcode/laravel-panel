<label class="relative inline-flex items-center mb-4 pointer">
    <input
        type="checkbox"
        class="sr-only peer"
        id='{{ $name }}'
        name='{{ $name }}'
        {{ $value }}
        {{ $attributes }}
    >

    <div class="w-11 h-6 bg-secondary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-secondary after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-color-main"></div>
    <span class="ml-3 text-sm font-medium text-secondary">{{ $label.$is_required }}</span>

    <span class='absolute right-0 bottom-0 validit'></span>
</label>
