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
     * @var string $label
     */
    public $label;

    /**
     * @var string $dchecked
     */
    public $dchecked;

    /**
     * @var ?string $value
     */
    public $value;

    /**
     * @var ?string $is_required
     */
    public $is_required;

    /**
     * @var mixed $attributes
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
        // $is_required = null;
        // $attr = null;

        // if(isset($attributes)):
        //     if(is_array($attributes)):
        //         foreach($attributes as $indice => $attribute):
        //             $attr .= "{$indice}={$attribute} ";
        //             $is_required = $indice == 'required' ? '*' : null;
        //         endforeach;
        //     else:
        //         $attr = $attributes;
        //         $is_required = $attributes == 'required' ? '*' : null;
        //     endif;
        // endif;

        // $checked = (!isset($value) || $value == 'off') ? '' : 'checked';

        // if(isset($invert_value) && $invert_value):
        //     $checked = $checked == 'checked' ? '' : 'checked';
        // endif;

        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
        $this->dchecked = is_null($dchecked) ? 'off' : $dchecked;
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
