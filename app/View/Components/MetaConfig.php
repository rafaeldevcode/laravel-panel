<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MetaConfig extends Component
{
    /**
     * @var string $config
     */
    public $description;

    /**
     * @var string $title
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param array $config
     * @return void
     */
    public function __construct(string $description, string $title)
    {
        $settings = DB::table('settings')->first();

        $this->description = empty($description) ? $settings->site_description : $description;
        $this->title       = empty($title) ? $settings->site_name : $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.meta-config');
    }
}
