<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Logo extends Component
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

        $this->image        = $settings->site_logo == 'logo.png' ? "/assets/images/{$settings->site_logo}" : "/storage/{$settings->site_logo}";
        $this->description  = $settings->site_description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
