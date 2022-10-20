<div class='d-flex flex-nowrap align-items-center shadow p-2 profile'>
    <div class='user'>
        <a href='/admin/profile/edit' title='Editar perfil de {{ $auth->name  }}'>
            <img
                src='{{ asset("/assets/images/users/".$auth->avatar )}}'
                alt='{{ explode(' ', $auth->name)[0] }}'
                class='border border-color-main w-100'
            />
        </a>
    </div>
    <div class='btn-group hiddeItem dNone profile-dropdawn'  data-item-active='false'>
        <button type='button' title='Perfil' class='btn profile-dropdawn-btn w-100 dropdown-toggle text-cm-light fw-bold' data-bs-toggle='dropdown' aria-expanded='false'>
            {{ $auth->name  }}
        </button>
        <ul class='dropdown-menu dropdown-menu-dark'>
            <li>
                <a href='/admin/profile/edit' class='dropdown-item d-flex flex-row justify-content-between'>
                    Perfil
                    <i class='bi bi-person-bounding-box'></i>
                </a>
            </li>
            <li>
                <a href='#' id="oppen-notification-profile" class='dropdown-item d-flex flex-row justify-content-between'>
                    Notificações
                    <i class='bi bi-bell-fill position-relative'>
                        @if($count_notifications > 0)
                            <i class='bi bi-circle-fill fs-6 text-cm-danger position-absolute top-0 end-0 bubbleNotification'></i>
                        @endif
                    </i>
                </a>
            </li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" title="Fazer logout" class='dropdown-item d-flex flex-row justify-content-between'>
                        Logout
                        <i class='bi bi-box-arrow-right'></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $('#oppen-notification-profile').click((event)=>{
        oppenNotifications(event);
    });
</script>
