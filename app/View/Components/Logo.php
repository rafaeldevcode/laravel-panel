<?php

namespace App\View\Components;

use App\Models\Gallery;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Logo extends Component
{
    public $image;

    public $description;

    public function __construct()
    {
        $settings = Setting::first();

        $this->image = $this->getPathImage($settings?->site_logo_main, 'logo_main.svg');
        $this->description = $settings?->site_description;
    }

    public function render(): View|Closure|string
    {
        return view('components.logo');
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
