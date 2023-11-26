<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MetaConfig extends Component
{
    public $title;

    public $description;

    public function __construct(string $title, string $description = '')
    {
        $settings = Setting::first();

        $this->title = empty($title) ? $settings?->site_name : "{$settings?->site_name} | {$title}";
        $this->description = empty($description) ? $settings?->site_description : $description;
    }

    public function render(): View|Closure|string
    {
        return view('components.meta-config');
    }
}
