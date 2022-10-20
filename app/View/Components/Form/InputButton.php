<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputButton extends Component
{
    /**
     * @var string $style
     */
    public $style;

    /**
     * @var string $type
     */
    public $type;

    /**
     * @var string $title
     */
    public $title;

    /**
     * @var string $value
     */
    public $value;

    /**
     * @var mixed $attributes
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
        $this->style    = $style;
        $this->type     = $type;
        $this->title    = $title;
        $this->value    = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-button');
    }
}
