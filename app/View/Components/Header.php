<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $setting;

    public function __construct()
    {
        $setting = Menu::where('prefix', 'settings')->first();

        $this->setting = $setting?->slug;
    }

    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
