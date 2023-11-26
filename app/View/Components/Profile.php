<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    public $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    public function render(): View|Closure|string
    {
        return view('components.profile');
    }
}
