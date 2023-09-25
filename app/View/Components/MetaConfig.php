<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MetaConfig extends Component
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
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
        $settings = Setting::first();

        $this->description = empty($description) ? $settings->site_description : $description;
        $this->title = empty($title) ? $settings->site_name : $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.meta-config');
    }
}
