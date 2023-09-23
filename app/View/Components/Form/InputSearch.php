<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSearch extends Component
{
    /**
     * @var ?string
     */
    public $value;

    /**
     * @var mixed
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param ?string $value
     * @return void
     */
    public function __construct(?string $value = null)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-search');
    }
}
