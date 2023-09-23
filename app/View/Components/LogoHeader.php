<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class LogoHeader extends Component
{
    /**
     * @var string
     */
    public $image;

    /**
     * @var string
     */
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings = DB::table('settings')->first();

        $this->image = $settings->site_logo_header == 'logo_header.png' ? "/assets/images/{$settings->site_logo_header}" : "/storage/{$settings->site_logo_header}";
        $this->description = $settings->site_description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.logo-header');
    }
}
