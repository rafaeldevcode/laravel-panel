<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * @var string
     */
    public $site_name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->site_name = Setting::first()
            ?->site_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
