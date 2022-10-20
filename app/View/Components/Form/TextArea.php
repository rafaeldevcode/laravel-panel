<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * @var string $name
     */
    public $name;

    /**
     * @var mixed $attributes
     */
    public $attributes;

    /**
     * @var ?string $value
     */
    public $value;

    /**
     * @var string $icon
     */
    public $icon;

    /**
     * @var string $label
     */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param ?string $value
     * @param string $icon
     * @param string $label
     * @return void
     */
    public function __construct(string $name, ?string $value = null, string $icon, string $label)
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->icon     = $icon;
        $this->label    = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}
