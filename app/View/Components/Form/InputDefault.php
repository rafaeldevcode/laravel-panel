<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputDefault extends Component
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
     * @var string $label
     */
    public $label;

    /**
     * @var string $type
     */
    public $type;

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
     * @param string $label
     * @param string $type
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, string $icon, string $label, string $type, ?string $value = null)
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
        $this->value    = $value;
        $this->icon     = $icon;
        $this->label    = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-default');
    }
}
