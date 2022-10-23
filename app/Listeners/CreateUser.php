<?php

namespace App\Listeners;

use App\Events\NotificationUser;
use App\Models\Notifications;
use App\Models\NotificationsUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NotificationUser  $event
     * @return void
     */
    public function handle(NotificationUser $event)
    {
        $notification = Notifications::create([
            'name'                => 'Boas Vindas!',
            'notification'        => "<h2><span style='color: rgb(53, 152, 219);'>Ol&aacute; {$event->user->name}, seja bem vindo! :)</span></h2><p>O que voc&ecirc; ir&aacute; encontrar por aqui:</p><p><strong>1:&nbsp;</strong>Relat&oacute;rios de ROI de suas campanhas atualizadas de hora em hora;</p><p><strong>2: </strong>Pausar suas campanhas que n&atilde;o est&atilde;o com resultados esperados;</p> <p><strong>3: </strong>Baixar seus relat&oacute;rios;</p><p><strong>4:</strong> E muito mais, isso aqui est&aacute; apenas come&ccedil;ando.</p><p>&nbsp;</p><p><em><strong>Como j&aacute; dizia um autor desconhecido:</strong><br><span style='color: rgb(52, 73, 94);'>'A grande conquista &eacute; o resultado de pequenas vit&oacute;rias que passam despercebidas.'</span></em></p>"
        ]);

        $event->user->notifications()->attach($notification->id);
        NotificationsUser::where('notifications_id', $notification->id)->where('user_id', $event->user->id)->update(['notification_status' => 'on']);
    }
}
