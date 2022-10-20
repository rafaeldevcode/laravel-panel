<section class='p-2 p-md-5 bg-cm-grey m-3 rounded shadow'>
    <form method="POST" action="/admin/users/edit/{{ $user->id }}">
        @csrf
        <div class='row d-flex justify-content-between'>
            <div class='col-12 col-md-6'>
                <x-input-text name='name' label='Nome do usuário' icon='bi bi-person-fill' required :value='$user->name' required />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-email name='email' label='Email' icon='bi bi-envelope-fill' disabled :value='$user->email' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='phone' label='Telefone' icon='bi bi-phone-fill' :value='$user->phone' />
            </div>

            <div class='col-12 col-md-6'>
                <div class='d-flex flex-column position-relative my-4'>
                    <i class='bi bi-file-earmark-lock-fill position-absolute m-2'></i>
                    <select class='form-select ps-4 focus-shadown-none' name='permission' id='permission' required>
                        <option value='{{ $user->permission->id }}'>{{ $user->permission->name }}</option>

                        @foreach ($permissions as $permission)
                            <option value='{{ $permission->id }}'>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    <label class='position-absolute ms-4 my-2 px-2 input-transform-translate' for='permission'>Selecione uma permissão</label>
                    <span class='position-absolute end-0 bottom-0 validit'></span>
                </div>
            </div>

            <div class='col-12 col-md-6'>
                <x-input-date name='birth_date' label='Data de nascimento' icon='bi bi-calendar-fill' :value='$user->birth_date' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='password' label='Digite a nova senha (Deixa em branco caso não queira alterar)' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-pass name='repeat_password' label='Repita a nova senha' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-text name='initials_campaign' label='Iniciais do campaign' icon='bi bi-globe2' :value='$user->initials_campaign' />
            </div>

            <div class='col-12 col-md-6'>
                <x-input-select name='user_type' :value='$user_type' icon='bi bi-person-lines-fill' label='Selecione o tipo de usuário' :array='$all_user_typers' required />
            </div>
        </div>

        <div class='col-12 col-md-6'>
            <x-input-checkbox-switch name="user_status" label='Status do usuário (Ativo | Inativo)' :dchecked='$user_status' />
        </div>

        <div class='row d-flex justify-content-end'>
            <div class='col-12 col-md-3'>
                <x-input-button type='submit' title='Salvar usuário' value='Salvar usuário' style='cm-primary' />
            </div>
        </div>
    </form>
</section>
