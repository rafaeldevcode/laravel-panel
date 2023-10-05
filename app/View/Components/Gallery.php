<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gallery extends Component
{
    /**
     * Create a new component instance.
     *
     * @since 1.9.0
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return view('components.gallery');
    }
}
