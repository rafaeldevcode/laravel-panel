<section class="p-3 bg-light m-0 sm:m-3 rounded shadow-lg">
    <div class='relative'>
        <x-bg-profile />

        <div class='mx-auto relative profile-user'>
            <img
                class="border border-color-main w-full absolute bottom-0 left-0"
                src="{{ asset("/assets/images/users/".$user->avatar) }}"
                alt="{{ $user->name }}"
            />

            <button
                class='absolute bottom-0 left-0 w-full h-full bg-white profile-user-btn font-bold text-color-main'
                data-toggle="avatar"
                title="Abrir modal com imagens de perfil"
            >
                Alterar
            </button>
        </div>

        <div class='absolute top-0 left-0 m-3 text-color-main'>
            <p class='p-0 m-0 text-3xl font-bold'>{{ $user->name }}</p>
        </div>

        <div class='absolute top-0 right-0 m-3'>
            <span class='text-light bg-{{ $status[0] }} rounded px-2 py-1 font-bold'>
                <i class='bi bi-circle-fill'></i>
                {{ $status[1] }}
            </span>
        </div>
    </div>

    <form method="POST" action="/admin/profile/edit">
        @csrf

        <div class="flex justify-between flex-wrap">
            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="name" label="Nome do usuário" icon="bi bi-person-fill" :value="$user->name" type="text" required />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="email" label="Email" icon="bi bi-envelope-fill" :value="$user->email" type="email" disabled />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="phone" label="Telefone" icon="bi bi-phone-fill" :value="$user->phone" type="text" />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="permissions" label="Permissão" icon="bi bi-file-earmark-lock-fill" :value="$user_permission" type="text" disabled />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="birth_date" label="Data de nascimento" icon="bi bi-calendar-fill" :value="$user->birth_date" type="date" />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="current_password" label="Senha atual (Deixe em branco caso não queira altera-la)" icon="bi bi-key-fill" type="password" />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="password" label="Nova senha" icon="bi bi-key-fill" type="password" />
            </div>

            <div class="w-full md:w-6/12 px-4">
                <x-input-default name="repeat_password" label="Repita sua nova senha" icon="bi bi-key-fill" type="password" />
            </div>
        </div>

        <div class="flex justify-end px-4">
            <x-input-button type="submit" title="Salvar perfil" value="Salvar perfil" style="color-main" />
        </div>
    </form>
</section>
