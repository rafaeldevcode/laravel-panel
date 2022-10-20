<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tinymce extends Component
{
    /**
     * @var string $name
     */
    public $name;

    /**
     * @var ?string $value
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
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tinymce');
    }
}
