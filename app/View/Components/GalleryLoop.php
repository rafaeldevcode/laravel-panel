<?php

namespace App\View\Components;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryLoop extends Component
{
    public $images;

    public $close;

    public $use;

    public $total;

    public function __construct(bool $close, bool $use)
    {
        $this->close = $close;
        $this->use = $use;
        $this->images = Gallery::orderByDesc('id')->paginate(30);
        $this->total = Gallery::count();
    }

    public function render(): View|Closure|string
    {
        return view('components.gallery-loop');
    }
}
