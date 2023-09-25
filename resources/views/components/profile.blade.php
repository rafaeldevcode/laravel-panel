<div class='flex flex-nowrap items-center shadow lg p-2 profile shadow-xl'>
    <div class='user'>
        <a href='{{ route('profile.edit') }}' title='Editar perfil de Rafael'>
            <img class='border border-color-main w-full' src='{{ asset("/assets/images/users/".$auth->avatar )}}' alt='{{ explode(' ', $auth->name)[0] }}' />
        </a>
    </div>

    <div class='hiddeItem dNone profile-dropdawn'  data-item-active='false'>
        <a href="{{ route('profile.edit') }}" title='Ver e editar perfil' class='profile-dropdawn-btn w-full text-light font-bold' aria-expanded='false'>
            {{ explode(' ', $auth->name)[0] }}
        </a>

        <!-- <ul class='dropdown-menu dropdown-menu-dark'>
            <li>
                <a title="Editar perfil" href='{{ route('profile.edit') }}' class='dropdown-item flex flex-row justify-between'>
                    Perfil
                    <i class='bi bi-person-bounding-box'></i>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    <button type="submit" title="Fazer logout" class='dropdown-item flex flex-row justify-between'>
                        Logout
                        <i class='bi bi-box-arrow-right'></i>
                    </button>
                </form>
            </li>
        </ul> -->
    </div>
</div>
