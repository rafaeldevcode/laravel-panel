<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class LogoHeader extends Component
{
    /**
     * @var string $image
     */
    public $image;

    /**
     * @var string $description
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

        $this->image        = $settings->site_logo_header == 'logo_header.png' ? "/assets/images/{$settings->site_logo_header}" : "/storage/{$settings->site_logo_header}";
        $this->description  = $settings->site_description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo-header');
    }
}
