<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputCheckboxSwitch extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $dchecked;

    /**
     * @var ?string
     */
    public $value;

    /**
     * @var ?string
     */
    public $is_required;

    /**
     * @var mixed
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $dchecked
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, string $label, string|null $dchecked = null, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->dchecked = is_null($dchecked) ? 'off' : $dchecked;

        if(isset($this->attributes)):
            if($this->attributes['required'] && $this->attributes['required'] == true):
                $this->is_required = '*';
            endif;
        endif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-checkbox-switch');
    }
}
