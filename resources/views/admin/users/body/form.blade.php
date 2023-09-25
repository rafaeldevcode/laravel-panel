<section class='p-3 bg-light m-0 sm:m-3 rounded shadow-lg'>
    <form method="POST" action="{{ isset($user) ? route('users.update', ['ID', $user->id]) : route('users.store') }}">
        @csrf
        @isset($user)
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endisset

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='name' label='Nome do usuário' icon='bi bi-person-fill' type="text" :value="isset($user) ? $user->name: null" required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='email' label='Email' icon='bi bi-envelope-fill' type="email" :value="isset($user) ? $user->email: null"  required />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-select name='permission' label='Selecione uma permissão' icon='bi bi-file-earmark-lock-fill' :options="[1 => 'Permissão']" optionid="" optionvalue=""  />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='password' label='Senha' icon="bi bi-key-fill" type="password" :required="isset($user) ? false : true" />
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <x-input-default name='repeat_password' label='Digíte sua senha novamente' icon="bi bi-key-fill" type="password" :required="isset($user) ? false : true" />
            </div>
        </div>

        <div class='w-full md:w-6/12 px-4'>
            <x-input-checkbox-switch name="user_status" label='Status do usuário (Ativo | Inativo)' :value="isset($user) ? $user->status : null" />
        </div>

        <div class='flex justify-end px-4'>
            <x-input-button type='submit' title='Salvar usuário' value='Salvar usuário' style='color-main' />
        </div>
    </form>
</section>
