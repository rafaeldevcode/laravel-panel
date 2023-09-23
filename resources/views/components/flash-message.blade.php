<div class="fixed top-0 right-0 rounded p-4 z-[99999] text-white font-bold max-w-[400px]" data-message="content">
    <div class="rounded shadow-lg p-4 flex items-center relative my-1 bg-{{ $color }}" data-message="true">
        <i class="{{ $icon }} text-xl"></i>
        <p class="ml-4 text-sm">{{ $message }}</p>
        <i class="bi bi-x absolute top-0 right-1 opacity-75 pointer" data-message="hide"></i>
    </div>
</div>
