<?php

namespace App\View\Components;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    /**
     * @var Auth $auth
     */
    public $auth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth                = Auth::user();
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
}
