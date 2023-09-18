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
     * @var string $icon
     */
    public $icon;

    /**
     * @var mixed $options
     */
    public $options;

    /**
     * @var string $optionid
     */
    public $optionid;

    /**
     * @var string $optionvalue
     */
    public $optionvalue;

    /**
     * @var ?string $label
     */
    public $label;

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
     * @param string $icon
     * @param mixed $options
     * @param string $optionid
     * @param string $optionvalue
     * @param ?string $label
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, string $icon, mixed $options, string $optionid, string $optionvalue, ?string $label = null, ?string $value = null)
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

        $this->name     = $name;
        $this->icon     = $icon;
        $this->options    = $options;
        $this->optionid = $optionid;
        $this->optionvalue = $optionvalue;
        $this->label    = $label;
        $this->value    = $value;
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
