<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputCheckboxSwitch extends Component
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
     * @var string $label
     */
    public $label;

    /**
     * @var string $dchecked
     */
    public $dchecked;

    /**
     * @var mixed $attributes
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param ?string $value
     * @param string $label
     * @param string $dchecked
     * @return void
     */
    public function __construct(string $name, ?string $value = null, string $label, string $dchecked = 'off')
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
        $this->dchecked = $dchecked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-checkbox-switch');
    }
}
