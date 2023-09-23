<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Favicon extends Component
{
    /**
     * @var string
     */
    public $favicon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings = DB::table('settings')->first();
        $this->favicon = $settings->site_favicon == 'favicon.png' ? "/assets/images/{$settings->site_favicon}" : "/storage/{$settings->site_favicon}";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.favicon');
    }
}
