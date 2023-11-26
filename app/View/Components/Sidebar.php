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
    /**
     * @var mixed
     */
    public $menus;

    /**
     * @var string
     */
    public $uri;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = Menu::where('show', StatusEnum::ON)->orderBy('position', 'ASC')->get();
        $this->uri = explode('/', request()->route()->uri)[1];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
