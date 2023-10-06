<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var mixed
     */
    public $options;

    /**
     * @var string
     */
    public $optionid;

    /**
     * @var string
     */
    public $optionvalue;

    /**
     * @var ?string
     */
    public $label;

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
     * @param string $icon
     * @param mixed $options
     * @param string $optionid
     * @param string $optionvalue
     * @param ?string $label
     * @param ?string $value
     * @return void
     */
    public function __construct(string $name, string $icon, mixed $options = [], string $optionid = '', string $optionvalue = '', ?string $label = null, ?string $value = null)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->options = $options;
        $this->optionid = $optionid;
        $this->optionvalue = $optionvalue;
        $this->label = $label;
        $this->value = $value;

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
        return view('components.form.input-select');
    }
}
