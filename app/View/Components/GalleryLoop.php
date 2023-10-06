<?php

namespace App\View\Components;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryLoop extends Component
{
    /**
     * @var
     */
    public $images;

    /**
     * @var bool
     */
    public $close;

    /**
     * @var bool
     */
    public $use;

    /**
     * @var int
     */
    public $total;

    /**
     * Create a new component instance.
     *
     * @since 1.9.0
     *
     * @param bool $close
     * @param bool $use
     */
    public function __construct(bool $close, bool $use)
    {
        $this->close = $close;
        $this->use = $use;
        $this->images = Gallery::orderByDesc('id')->paginate(30);
        $this->total = Gallery::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @since 1.9.0
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery-loop');
    }
}
