<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputSelect extends Component
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
     * @var string $icon
     */
    public $icon;

    /**
     * @var ?string $label
     */
    public $label;

    /**
     * @var mixed $array
     */
    public $array;

    /**
     * @var mixed $attributes
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param ?string $value
     * @param string $icon
     * @param ?string $label
     * @param mixed $array
     * @return void
     */
    public function __construct(string $name, ?string $value = null, string $icon, ?string $label = null , mixed $array)
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->icon     = $icon;
        $this->label    = $label;
        $this->array    = $array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-select');
    }
}
