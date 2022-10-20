<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputFileImage extends Component
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
     * @var string $label
     */
    public $label;

    /**
     * @var string $src
     */
    public $src;

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
     * @param string $label
     * @param string $src
     * @return void
     */
    public function __construct(string $name, ?string $value = null, string $icon, string $label, string $src)
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->icon     = $icon;
        $this->label    = $label;
        $this->src      = $src;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-file-image');
    }
}
