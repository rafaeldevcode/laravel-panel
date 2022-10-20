<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BgLogin extends Component
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
     * @var string $name
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings = DB::table('settings')->first();

        $this->image        = $settings->site_bg_login == 'login_bg.png' ? "/assets/images/{$settings->site_bg_login}" : "/storage/{$settings->site_bg_login}";
        $this->description  = $settings->site_description;
        $this->name         = $settings->site_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bg-login');
    }
}
