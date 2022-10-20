<div class='modal fade' id='avatar' tabIndex='-1' aria-labelledby='avatar-label' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content border border-color-main'>
            <form action="/admin/profile/image/edit" method="POST">
                @csrf
                <div class='modal-header bg-color-main'>
                    <h5 class='modal-title text-cm-light' id='avatar-label'>Escolha uma imagem</h5>
                    <button title='Fechar modal' type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                </div>

                <div class='modal-body'>
                    <div class='d-flex flex-wrap justify-content-evenly m-0'>
                        @foreach (config('imagesprofile.profile') as $indice => $image)
                            <div class='m-2'>
                                <input class='d-none' type='radio' name='avatar' id='{{ $indice }}' value='{{ $image['src'] }}'>
                                <label for='{{ $indice }}' class='form-check-label rounded-circle label-image-profile'>
                                    <img class="w-100 rounded-circle" src="{{ asset("/assets/images/users/{$image['src']}") }}" alt="{{ $image['alt'] }}">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer p-2">
                    <x-input-button type='submit' title='Salvar imagem' value='Salvar' style='color-main' />
                </div>
            </form>
        </div>
    </div>
</div>
