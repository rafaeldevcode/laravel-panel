<?php

namespace App\View\Components;

use App\Models\Gallery;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Favicon extends Component
{
    public $favicon;

    public function __construct()
    {
        $settings = Setting::first();
        $this->favicon = $this->getPathImage($settings?->site_favicon, 'favicon.svg');
    }

    public function render(): View|Closure|string
    {
        return view('components.favicon');
    }

    private function getPathImage(?int $image, string $default): string
    {
        if($image):
            $gallery = Gallery::find($image);

            return "storage/{$gallery->file}";
        else:
            return "assets/images/{$default}";
        endif;
    }
}
