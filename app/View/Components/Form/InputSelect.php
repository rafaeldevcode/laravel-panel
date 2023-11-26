<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    public $name;

    public $icon;

    public $options;

    public $optionid;

    public $optionvalue;

    public $label;

    public $value;

    public $is_required;

    public $attributes;

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

    public function render(): View|Closure|string
    {
        return view('components.form.input-select');
    }
}
