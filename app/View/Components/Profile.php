<?php

namespace App\View\Components;

use App\Models\Notifications;
use App\Models\NotificationsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    /**
     * @var Auth $auth
     */
    public $auth;

    /**
     * @var mixed $notifications
     */
    public $count_notifications;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth                = Auth::user();
        $this->count_notifications = count($this->getNotifications());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile');
    }

    /**
     * @return mixed
     */
    private function getNotifications(): mixed
    {
        $ids = [];
        $notifications_user = NotificationsUser::where('notification_status', 'on')->where('user_id', Auth::user()->id)->get('notifications_id');

        foreach($notifications_user as $id):
            array_push($ids, $id->notifications_id);
        endforeach;

        $notifications = Notifications::whereIn('id', $ids)->get();

        return $notifications;
    }
}
