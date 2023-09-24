<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form method="POST" action="/admin/users/create">
        @csrf
        @if(isset($user))
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='name' label='Nome do usuário' icon='bi bi-person-fill' type="text" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='email' label='Email' icon='bi bi-envelope-fill' type="email" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='phone' label='Telefone' icon='bi bi-phone-fill' type="text" />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-select name='permission' label='Selecione uma permissão' icon='bi bi-file-earmark-lock-fill' :options="[]" optionid="" optionvalue=""  />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='birth_date' label='Data de nascimento' icon='bi bi-calendar-fill' type="date" />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='password' label='Senha' icon="bi bi-key-fill" type="password" required />
            </div>
        </div>

        <div class='w-full md:w-6/12 px-4'>
            <x-input-checkbox-switch name="user_status" label='Status do usuário (Ativo | Inativo)' />
        </div>

        <div class='flex justify-end px-4'>
            <x-input-button type='submit' title='Salvar usuário' value='Salvar usuário' style='color-main' />
        </div>
    </form>
</section>
