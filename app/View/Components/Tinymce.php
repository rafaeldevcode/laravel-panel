<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tinymce extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var ?string
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.tinymce');
    }
}
