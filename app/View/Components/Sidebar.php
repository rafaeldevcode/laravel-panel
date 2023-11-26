<?php

namespace App\View\Components;

use App\Enums\StatusEnum;
use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $menus;

    public $uri;

    public function __construct()
    {
        $this->menus = Menu::where('show', StatusEnum::ON)->orderBy('position', 'ASC')->get();
        $this->uri = explode('/', request()->route()->uri)[1];
    }

    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
