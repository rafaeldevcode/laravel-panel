<div id="notifications" class='position-fixed bottom-0 end-0 notification border border-color-main bg-cm-light p-2 rounded w-100'>
    <button title="Abrir notificações" id="oppen-notification" class='border border-cm-secondary border notification-btn position-absolute bg-color-main end-0 rounded-circle p-1 d-flex justify-content-center align-items-center'>
        <i class='bi bi-bell-fill fs-4 text-cm-light'>
            @if(count($notifications) > 0)
                <span class='position-absolute top-0 end-0 bg-danger d-block notification-count' id='notification-count'>
                    {{ count($notifications) }}
                </span>
            @endif
        </i>
    </button>

    <div class='notification-contents'>
        <div class="py-2 text-end col-12" {{ count($notifications) > 0 ? '' : 'hidden' }}>
            <button class="border-0 bg-transparent text-cm-primary pointer zindex-100" type="button" title="Marcar todas as norificaçãoe como vistas" id="nark-all-view">
                Marcar todas como vista
            </button>
        </div>

        <div class='alert alert-cm-info' data-notification-count {{ count($notifications) > 0 ? 'hidden' : '' }}>
            <p class='text-center fw-bold text-color-main m-0'>Sem notificações por aqui!</p>
        </div>

        @foreach ($notifications as $notification)
            <div class='border border-color-main rounded w-100 p-2 position-relative mb-2 bg-cm-light'>
                <div class='notification-contents-box'>
                    <p class='fw-bold text-color-main'>{{ $notification->name }}</p>

                    <article data-content="false" id='{{ $notification->id }}'>
                        {!! $notification->notification !!}

                        <form data-submit='notification' method='POST' action='/admin/notifications/{{ $notification->id }}/view'>
                            @csrf
                            <input type='hidden' name='ID' value='{{ $notification->id }}'>

                            <button title='Marcar esta notificação como já visualizada' type='submit' class='bg-transparent border-0 text-cm-primary'>
                                Marcar como visto
                            </button>
                        </form>
                    </article>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    $('#oppen-notification').click((event)=>{
        oppenNotifications(event);
    });

    oppenOrClosedNotification();
    markNotificationSeen();
    markAllNotificationWith()
</script>
