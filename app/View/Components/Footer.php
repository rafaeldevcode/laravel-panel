<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $site_name;

    public function __construct()
    {
        $this->site_name = Setting::first()
            ?->site_name;
    }

    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
