<div data-modal="avatar" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class='bg-white max-w-[800px] border border-color-main rounded' data-modal-body="popup">
        <form action="/admin/profile/image/edit" method="POST">
            @csrf

            <div class='bg-color-main relative'>
                <button data-modal-close="popup" type="button" title="Fechar modal" class="absolute top-0 right-2 text-white w-[30px] opacity-50">
                    <i class="bi bi-x text-2xl"></i>
                </button>

                <h2 class="bg-color-main font-bold text-white px-2 py-4 rounded-t text-gray-900">Escolha uma imagem</h2>
            </div>

            <div>
                <div class='flex flex-wrap justify-evenly m-0'>
                    @foreach (config('imagesprofile.profile') as $indice => $image)
                        <div class='m-2'>
                            <input data-checked="add-style" hidden type='radio' name='avatar' id='{{ $indice }}' value='{{ $image['src'] }}' {{ $image['src'] == $user->avatar ? 'checked' : '' }}>

                            <label for='{{ $indice }}' class='rounded-full label-image-profile block'>
                                <img class="w-full rounded-full" src="{{ asset("/assets/images/users/{$image['src']}") }}" alt="{{ $image['alt'] }}">
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end p-2">
                <x-input-button type='submit' title='Salvar imagem' value='Salvar' style='color-main' />
            </div>
        </form>
    </div>
</div>
