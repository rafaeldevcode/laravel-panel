<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputButton extends Component
{
    /**
     * @var string
     */
    public $style;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $value;

    /**
     * @var mixed
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $style
     * @param string $type
     * @param string $title
     * @param string $value
     * @return void
     */
    public function __construct(string $style, string $type, string $title, string $value)
    {
        $this->style = $style;
        $this->type = $type;
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-button');
    }
}
