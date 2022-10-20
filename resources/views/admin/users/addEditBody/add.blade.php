<section class='p-2 p-md-5 bg-cm-grey m-3 rounded shadow'>
    @php
        $user_status = isset($user->user_status) && $user->user_status === 'on' ? 'on' : 'off';
    @endphp

    <form method="POST" action="/admin/users/add">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome do usuário' icon='bi bi-person-fill' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-email name='email' label='Email' icon='bi bi-envelope-fill' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='phone' label='Telefone' icon='bi bi-phone-fill' />
            </div>

            <div class='col-12 col-md-6'>
                <div class='d-flex flex-column position-relative my-4'>
                    <i class='bi bi-file-earmark-lock-fill position-absolute m-2'></i>
                    <select class='form-select ps-4 focus-shadown-none' name='permission' id='permission' required>
                        @foreach ($permissions as $permission)
                            <option value='{{ $permission->id }}'>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    <label class='position-absolute ms-4 my-2 px-2 input-transform-translate' for='permission'>Selecione uma permissão</label>
                    <span class='position-absolute end-0 bottom-0 validit'></span>
                </div>
            </div>

            <div class='col-12 col-md-6'>
                <x-input-date name='birth_date' label='Data de nascimento' icon='bi bi-calendar-fill' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='password' label='Senha' required />
            </div>
        </div>

        <div class='col-12 col-md-6'>
            <x-input-checkbox-switch name="user_status" label='Status do usuário (Ativo | Inativo)' />
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar usuário' value='Salvar usuário' style='color-main' />
            </div>
        </div>
    </form>
</section>
