<?php

namespace App\View\Components;

use App\Models\Notification as ModelsNotifications;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * @var mixed $notifications
     */
    public $notifications;

    /**
     * Create a new component instance.
     *
     * @param mixed $notifications
     * @return void
     */
    public function __construct()
    {
        $ids = [];
        $notifications_user = NotificationUser::where('notification_status', 'on')->where('user_id', Auth::user()->id)->get('notifications_id');

        foreach($notifications_user as $id):
            array_push($ids, $id->notifications_id);
        endforeach;

        $this->notifications = $this->getNotifications();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications');
    }

    /**
     * @return mixed
     */
    private function getNotifications(): mixed
    {
        $ids = [];
        $notifications_user = NotificationUser::where('notification_status', 'on')->where('user_id', Auth::user()->id)->get('notifications_id');

        foreach($notifications_user as $id):
            array_push($ids, $id->notifications_id);
        endforeach;

        $notifications = ModelsNotifications::whereIn('id', $ids)->get();

        return $notifications;
    }
}
