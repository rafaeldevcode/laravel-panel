<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Favicon extends Component
{
    /**
     * @var string $favicon
     */
    public $favicon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings      = DB::table('settings')->first();
        $this->favicon = $settings->site_favicon == 'favicon.png' ? "/assets/images/{$settings->site_favicon}" : "/storage/{$settings->site_favicon}";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favicon');
    }
}
