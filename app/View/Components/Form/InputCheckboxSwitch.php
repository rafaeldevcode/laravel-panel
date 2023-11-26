<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputCheckboxSwitch extends Component
{
    public $name;

    public $label;

    public $value;

    public $is_required;

    public $attributes;

    public function __construct(string $name, string $label, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value === 'on' ? 'checked' : '';
        $this->label = $label;

        if(isset($this->attributes)):
            if($this->attributes['required'] && $this->attributes['required'] == true):
                $this->is_required = '*';
            endif;
        endif;
    }

    public function render(): View|Closure|string
    {
        return view('components.form.input-checkbox-switch');
    }
}
