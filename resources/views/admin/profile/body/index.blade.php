<section class='p-3 bg-cm-grey m-3 rounded shadow'>
    <div class='position-relative'>
        <x-bg-profile />

        <div class='mx-auto position-relative profile-user'>
            <img
                class='border border-color-main w-100 position-absolute bottom-0 left-0'
                src='{{ asset('/assets/images/users/'.$user->avatar) }}'
                alt='{{ $user->name }}'
            />

            <button
                class='position-absolute bottom-0 left-0 w-100 h-100 bg-cm-light profile-user-btn'
                data-bs-toggle="modal"
                data-bs-target="#avatar"
            >
                <span class='text-color-main fw-bold'>Alterar</span>
            </button>
        </div>

        <div class='position-absolute top-0 start-0 m-3 text-color-main'>
            <p class='p-0 m-0 display-4 fw-bold'>{{ $user->name }}</p>
        </div>

        <div class='position-absolute top-0 end-0 m-3'>
            <span class='text-cm-light bg-cm-{{ $status[0] }} badge badge-sm fw-bold'>
                <i class='bi bi-circle-fill'></i>
                {{ $status[1] }}
            </span>
        </div>
    </div>

    <form method="POST" action="/admin/profile/edit">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome do usuário' icon='bi bi-person-fill' :value='$user->name' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-email name='email' label='Email' icon='bi bi-envelope-fill' :value='$user->email' disabled />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='phone' label='Telefone' icon='bi bi-phone-fill' :value='$user->phone' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='permissions' label='Permissão' icon='bi bi-file-earmark-lock-fill' :value='$user_permission' disabled />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-date name='birth_date' label='Data de nascimento' icon='bi bi-calendar-fill' :value='$user->birth_date' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='current_password' label='Senha atual (Deixe em branco caso não queira altera-la)' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='password' label='Nova senha' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='repeat_password' label='Repita sua nova senha' />
            </div>
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar perfil' value='Salvar perfil' style='color-main' />
            </div>
        </div>
    </form>
</section>
