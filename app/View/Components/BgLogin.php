<?php

namespace App\View\Components;

use App\Models\Gallery;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BgLogin extends Component
{
    public $image;

    public $description;

    public $name;


    public function __construct()
    {
        $settings = Setting::first();

        $this->image = $this->getPathImage($settings?->site_bg_login, 'bg_login.jpg');
        $this->description = $settings?->site_description;
        $this->name = $settings?->site_name;
    }

    public function render(): View|Closure|string
    {
        return view('components.bg-login');
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
