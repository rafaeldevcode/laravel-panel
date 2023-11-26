<div class='flex flex-col my-3'>
    <label for="{{ $name }}">{{ $label }}</label>

    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            @if(isset($icon))
                <i class='{{ $icon }} absolute mr-2 my-2 ml-1 text-secondary'></i>
            @endif
        </span>

        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes }}
            class="ps-8 shadow-sm italic border border-secondary text-secondary text-sm rounded focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-3"
        >
            <option>{{ $label.$is_required }}</option>

            @foreach($options as $indice => $item)
                <option value='{{ $indice }}' {{ isset($value) && $indice == $value ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
        </select>

        <span class='absolute right-0 bottom-0 validit'></span>
    </div>
</div>
