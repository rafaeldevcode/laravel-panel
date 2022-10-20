<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BgProfile extends Component
{
    /**
     * @var string $image
     */
    public $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings = DB::table('settings')->first();

        $this->image = $settings->site_bg_login == 'login_bg.png' ? "/assets/images/{$settings->site_bg_login}" : "/storage/{$settings->site_bg_login}";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bg-profile');
    }
}
